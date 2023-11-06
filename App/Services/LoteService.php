<?php

/**
 * La clase LoteService se encarga de gestionar los lotes en el sistema.
 */
class LoteService
{
  /**
   * @var LoteRepository Instancia del repositorio de lotes para acceder a los datos de los lotes.
   */
  private $loteRepository;

  /**
   * @var CategoriaRepository Instancia del repositorio de categorías para acceder a los datos de las categorías.
   */
  private $categoriaRepository;

  /**
   * @var FichaService Instancia del servicio de fichas para gestionar las fichas de los lotes.
   */
  private $fichaService;

  /**
   * @var UsuarioService Instancia del servicio de usuarios para obtener información sobre proveedores.
   */
  private $usuarioService;

  /**
   * @var LotePostulaRemateRepository Instancia del repositorio de relaciones entre lotes y remates.
   */
  private $lotePostulaRemateRepository;

  /**
   * Constructor de la clase LoteService.
   * 
   * @return void
   */
  public function __construct()
  {
    $this->loteRepository = Container::resolve(LoteRepository::class);
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
    $this->fichaService = Container::resolve(FichaService::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
    $this->lotePostulaRemateRepository = Container::resolve(LotePostulaRemateRepository::class);
  }

  /**
   * Obtiene todos los lotes registrados en el sistema.
   * 
   * @return array Un array de objetos de lote.
   */
  public function getLotes()
  {
    return $this->loteRepository->find();
  }

  /**
   * Obtiene un lote por su ID y enriquece la información con datos adicionales como ficha, categoría y proveedor.
   * 
   * @param int $id El ID del lote a buscar.
   * @return object|bool El objeto lote con información adicional si existe, o false si no se encuentra.
   */
  public function getLoteById($id)
  {
    $lote = $this->loteRepository->findById($id);
    if ($lote) {
      $idFicha = $lote->getIdFicha();
      $ficha = $this->fichaService->getFichaById($idFicha);
      $idCategoria = $lote->getIdCategoria();
      $categoria = $this->categoriaRepository->findById($idCategoria);
      $idProveedor = $lote->getIdProveedor();
      $proveedor = $this->usuarioService->getUsuarioById($idProveedor);
      $lote->setFicha($ficha);
      $lote->setCategoria($categoria);
      $lote->setProveedor($proveedor);
      return $lote;
    }
    abort(404);
  }

  /**
   * Obtiene los lotes de un proveedor específico y enriquece la información con datos adicionales.
   * 
   * @param int $idProveedor El ID del proveedor cuyos lotes se desean obtener.
   * @return array|bool Un array de objetos de lote con información adicional si existen, o false si no se encuentran.
   */
  public function getLotesDeProveedor($idProveedor)
  {
    $lotes = $this->loteRepository->findByProveedorId($idProveedor);
    if ($lotes) {
      foreach ($lotes as $lote) {
        $remate = $this->lotePostulaRemateRepository->findRemateByLoteId($lote->getId());
        if ($remate) {
          $idRemate = $remate->getIdRemate();
          $lote->setIdRemate($idRemate);
        }
        $idFicha = $lote->getIdFicha();
        $ficha = $this->fichaService->getFichaById($idFicha);
        $idCategoria = $lote->getIdCategoria();
        $categoria = $this->categoriaRepository->findById($idCategoria);
        $idProveedor = $lote->getIdProveedor();
        $proveedor = $this->usuarioService->getUsuarioById($idProveedor);
        $lote->setFicha($ficha);
        $lote->setCategoria($categoria);
        $lote->setProveedor($proveedor);
      }
      return $lotes;
    }
    return false;
  }

  /**
   * Crea un nuevo lote en el sistema.
   * 
   * @param object $loteModel El modelo de lote que contiene los datos del lote.
   * @return $int El ID del lote recién creado.
   */
  public function createLote($loteModel)
  {
    $fichaId = $this->fichaService->createFicha($loteModel->getFicha());
    $loteModel->setIdFicha($fichaId);
    $loteAssocArray = $this->loteToAssocArray($loteModel);
    $this->loteRepository->addLote($loteAssocArray);
    return $this->loteRepository->lastInsertId();
  }

  /**
   * Actualiza un lote existente en el sistema, junto con los datos de su ficha.
   * 
   * @param int $id El ID del lote a actualizar.
   * @param array $data Los datos actualizados del lote y su ficha.
   * @return bool true si la actualización se realiza con éxito, o false en caso de error.
   */
  public function updateLote($id, $data)
  {
    $loteData = $data['lote'];
    $fichaData = $data['ficha'];
    $this->loteRepository->beginTransaction();
    try {
      $this->loteRepository->updateLote($loteData['id_lote'], $loteData);
      $this->fichaService->updateFicha($fichaData['id_ficha'], $fichaData);
      $this->loteRepository->commit();
    } catch (PDOException $e) {
      $this->loteRepository->rollback();
      return false;
    } finally {
      $this->loteRepository->close();
    }
    return true;
  }

  /**
   * Elimina un lote del sistema, junto con sus relaciones y la ficha asociada.
   * 
   * @param int $id El ID del lote a eliminar.
   * @return bool true si la eliminación se realiza con éxito, o false en caso de error.
   */
  public function deleteLote($id)
  {
    $this->loteRepository->beginTransaction();
    try {
      $fichaId = $this->loteRepository->getFichaIdByLoteId($id)->getIdFicha();
      $this->lotePostulaRemateRepository->deleteLoteDeRemateByLoteId($id);
      $this->loteRepository->deleteLote($id);
      $this->fichaService->deleteFicha($fichaId);
      $this->loteRepository->commit();
    } catch (PDOException $e) {
      $this->loteRepository->rollback();
      return false;
    } finally {
      $this->loteRepository->close();
    }
    return true;
  }

  /**
   * Obtiene el nombre de usuario del ofertante con la mejor oferta en un remate específico y lote específico.
   * 
   * @param int $idRemate El ID del remate.
   * @param int $idLote El ID del lote.
   * @return string|bool El nombre de usuario del ofertante con la mejor oferta, o false si no hay ofertas.
   */
  public function getUsernameOfertante($idRemate, $idLote)
  {
    return $this->loteRepository->obtenerUsuarioConMejorOferta($idLote, $idRemate);
  }

  /**
   * Convierte un modelo de lote a un array asociativo.
   * 
   * @param object $loteModel El modelo de lote a convertir.
   * @return array Un array asociativo con los datos del lote.
   */
  private function loteToAssocArray($loteModel)
  {
    return [
      "imagen_lote" => $loteModel->getImagen(),
      "precio_base_lote" => $loteModel->getPrecioBase(),
      "mejor_oferta_lote" => $loteModel->getMejorOferta(),
      "id_proveedor_lote" => $loteModel->getIdProveedor(),
      "id_ficha_lote" => $loteModel->getIdFicha(),
      "id_categoria_lote" => $loteModel->getIdCategoria()
    ];
  }
}

?>
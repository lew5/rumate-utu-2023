<?php
/**
 * Clase que gestiona las operaciones relacionadas con los remates en el sistema.
 *
 * Esta clase proporciona métodos para crear, leer, actualizar y eliminar remates, así como para
 * obtener información detallada sobre los remates y los lotes asociados a ellos.
 */
class RemateService
{
  /**
   * @var RemateRepository Repositorio de remates para acceder a la base de datos.
   */
  private $remateRepository;

  /**
   * @var LotePostulaRemateRepository Repositorio de relaciones entre lotes y remates.
   */
  private $lotePostulaRemateRepository;

  /**
   * @var LoteService Servicio de lotes para realizar operaciones relacionadas con los lotes.
   */
  private $loteService;

  /**
   * Constructor de la clase RemateService.
   */
  public function __construct()
  {
    $this->remateRepository = Container::resolve(RemateRepository::class);
    $this->lotePostulaRemateRepository = Container::resolve(LotePostulaRemateRepository::class);
    $this->loteService = Container::resolve(LoteService::class);
  }

  /**
   * Obtiene todos los remates con sus lotes asociados.
   *
   * @return Remate[] Arreglo de objetos Remate con información de lotes asociados.
   */
  public function getRemates()
  {
    $remates = $this->remateRepository->find();
    $rematesConLotes = [];
    foreach ($remates as $remate) {
      $remate = $this->cambiarEstadoRemate($remate);
      $remate->setFechaInicio(formatFecha($remate->getFechaInicio()));
      $remate->setFechaFinal(formatFecha($remate->getFechaFinal()));
      $idRemate = $remate->getId();
      $lotes = $this->getLotes($idRemate);
      if (!empty($lotes)) {
        $remate->setLotes($lotes);
        $rematesConLotes[] = $remate;
      }
    }
    return $rematesConLotes;
  }

  /**
   * Obtiene los remates por título con sus lotes asociados.
   *
   * @param string $tituloRemate Título del remate a buscar.
   * @return Remate[] Arreglo de objetos Remate con información de lotes asociados.
   */
  public function getRematesByTitle($tituloRemate)
  {
    $remates = $this->remateRepository->findByTitle($tituloRemate);
    $rematesConLotes = [];
    foreach ($remates as $remate) {
      $remate = $this->cambiarEstadoRemate($remate);
      $remate->setFechaInicio(formatFecha($remate->getFechaInicio()));
      $remate->setFechaFinal(formatFecha($remate->getFechaFinal()));
      $idRemate = $remate->getId();
      $lotes = $this->getLotes($idRemate);
      if (!empty($lotes)) {
        $remate->setLotes($lotes);
        $rematesConLotes[] = $remate;
      }
    }
    return $rematesConLotes;
  }

  /**
   * Obtiene un remate por su ID con sus lotes asociados.
   *
   * @param int $id ID del remate a buscar.
   * @return Remate Objeto Remate con información de lotes asociados.
   */
  public function getRemateById($id)
  {
    $lotes = $this->getLotes($id);
    $remate = $this->remateRepository->findById($id);
    $remate = $this->cambiarEstadoRemate($remate);
    if ($lotes) {
      $remate->setLotes($lotes);
    } else {
      abort(404);
    }
    return $remate;
  }

  /**
   * Crea un nuevo remate en la base de datos con los lotes asociados.
   *
   * @param $RemateModel $remateModel Modelo de datos del remate a crear.
   * @return $int|bool ID del remate creado o false si hay un error.
   */
  public function createRemate($remateModel)
  {
    $lotes = $remateModel->getLotes();
    $this->remateRepository->beginTransaction();
    try {
      $remateData = $this->remateToAssocArray($remateModel);
      $this->remateRepository->addRemate($remateData);
      $remateId = $this->remateRepository->lastInsertId();
      $this->insertLotesByRemate($lotes, $remateId);
      $this->remateRepository->commit();
      return $remateId;
    } catch (PDOException $e) {
      // var_dump($e->errorInfo);
      $this->remateRepository->rollback();
      return false;
    } finally {
      $this->remateRepository->close();
    }
  }

  /**
   * Actualiza un remate en la base de datos.
   *
   * @param int $id ID del remate a actualizar.
   * @param $RemateModel $remateModel Modelo de datos actualizado del remate.
   * @return bool true si la actualización fue exitosa, false en caso de error.
   */
  public function updateRemate($id, $remateModel)
  {
    try {
      $this->remateRepository->updateRemate($id, $remateModel);
      return true;
    } catch (PDOException $e) {
      return false;
    } finally {
      $this->remateRepository->close();
    }
  }

  /**
   * Elimina un remate y sus lotes asociados de la base de datos.
   *
   * @param int $id ID del remate a eliminar.
   * @return bool true si la eliminación fue exitosa, false en caso de error.
   */
  public function deleteRemate($id)
  {
    $this->remateRepository->beginTransaction();
    try {
      $this->lotePostulaRemateRepository->deleteLoteDeRemate($id);
      // $this->remateRepository->deleteRemate($id);
      $this->remateRepository->commit();
      return true;
    } catch (PDOException $e) {
      $this->remateRepository->rollback();
      return false;
    } finally {
      $this->remateRepository->close();
    }
  }

  /**
   * Obtiene los lotes asociados a un remate.
   *
   * @param $int $idRemate ID del remate.
   * @return $Lote[]|null Arreglo de objetos Lote asociados al remate o null si no hay lotes.
   */
  public function getLotes($idRemate)
  {
    $lotesDeRemate = $this->lotePostulaRemateRepository->findLotesByRemateId($idRemate);
    $lotes = [];
    if (!($lotesDeRemate)) {
      return null; //cuando un remate no tine lotes asignados
    }
    if (is_object($lotesDeRemate)) {
      $lotes[] = $this->getLoteById($lotesDeRemate);
    } else {
      foreach ($lotesDeRemate as $lote) {
        $lotes[] = $this->getLoteById($lote);
      }
    }
    return $lotes;
  }

  /**
   * Obtiene un lote por su ID utilizando el servicio de lotes.
   *
   * @param $Lote $lote Objeto Lote.
   * @return $Lote|null Objeto Lote o null si no se encuentra.
   */
  private function getLoteById($lote)
  {
    $idLote = $lote->getIdLote();
    return $this->loteService->getLoteById($idLote);
  }

  /**
   * Convierte un objeto RemateModel a un arreglo asociativo para su inserción en la base de datos.
   *
   * @param $RemateModel $remateModel Modelo de datos del remate.
   * @return array Arreglo asociativo con datos del remate.
   */
  private function remateToAssocArray($remateModel)
  {
    return [
      "titulo_remate" => $remateModel->getTitulo(),
      "imagen_remate" => $remateModel->getImagen(),
      "fecha_inicio_remate" => $remateModel->getFechaInicio(),
      "fecha_final_remate" => $remateModel->getFechaFinal(),
      "estado_remate" => $remateModel->getEstado()
    ];
  }

  /**
   * Inserta los lotes asociados a un remate en la base de datos.
   *
   * @param $LoteModel[] $lotes Arreglo de modelos de datos de lotes.
   * @param int $remateId ID del remate al que se asocian los lotes.
   */
  public function insertLotesByRemate($lotes, $remateId)
  {
    foreach ($lotes as $loteModel) {
      $loteId = $this->loteService->createLote($loteModel);
      $this->lotePostulaRemateRepository->addLoteDeRemate([
        'id_remate_lote_postula_remate' => $remateId,
        'id_lote_lote_postula_remate' => $loteId,
      ]);
    }
  }

  private function cambiarEstadoRemate($remate)
  {
    if ($remate) {
      $hoy = date("Y-m-d H:i:s");
      $inicio = $remate->getFechaInicio();
      $final = $remate->getFechaFinal();

      if ($hoy < $inicio) {
        $this->updateRemate($remate->getId(), ['estado_remate' => "Pendiente"]);
        $remate->setEstado("Pendiente");
      } elseif ($hoy > $inicio && $hoy < $final) {
        $this->updateRemate($remate->getId(), ['estado_remate' => "Rematando"]);
        $remate->setEstado("Rematando");
      } else {
        $this->updateRemate($remate->getId(), ['estado_remate' => "Finalizado"]);
        $remate->setEstado("Finalizado");
      }
    }
    return $remate;
  }
}
?>
<?php

/**
 * La clase FichaService se encarga de gestionar las fichas de los lotes en el sistema.
 */
class FichaService
{
  /**
   * @var FichaRepository Instancia del repositorio de fichas para acceder a los datos de las fichas.
   */
  private $fichaRepository;

  /**
   * Constructor de la clase FichaService.
   * 
   * @return void
   */
  public function __construct()
  {
    $this->fichaRepository = Container::resolve(FichaRepository::class);
  }

  /**
   * Obtiene todas las fichas registradas en el sistema.
   * 
   * @return array Un array de objetos de ficha.
   */
  public function getFichas()
  {
    return $this->fichaRepository->find();
  }

  /**
   * Obtiene una ficha por su ID.
   * 
   * @param int $id El ID de la ficha a buscar.
   * @return object|bool El objeto ficha si existe, o false si no se encuentra.
   */
  public function getFichaById($id)
  {
    return $this->fichaRepository->findById($id);
  }

  /**
   * Crea una nueva ficha en el sistema.
   * 
   * @param object $fichaModel El modelo de ficha que contiene los datos de la ficha.
   * @return $int El ID de la ficha recién creada.
   */
  public function createFicha($fichaModel)
  {
    $fichaAssocArray = $this->fichaToAssocArray($fichaModel);
    $this->fichaRepository->addFicha($fichaAssocArray);
    return $this->fichaRepository->lastInsertId();
  }

  /**
   * Actualiza una ficha existente en el sistema.
   * 
   * @param int $id El ID de la ficha a actualizar.
   * @param array $data Los datos actualizados de la ficha.
   * @return void
   */
  public function updateFicha($id, $data)
  {
    $this->fichaRepository->updateFicha($id, $data);
  }

  /**
   * Elimina una ficha del sistema.
   * 
   * @param int $id El ID de la ficha a eliminar.
   * @return void
   */
  public function deleteFicha($id)
  {
    $this->fichaRepository->deleteFicha($id);
  }

  /**
   * Convierte un modelo de ficha a un array asociativo.
   * 
   * @param object $fichaModel El modelo de ficha a convertir.
   * @return array Un array asociativo con los datos de la ficha.
   */
  private function fichaToAssocArray($fichaModel)
  {
    return [
      "peso_ficha" => $fichaModel->getPeso(),
      "cantidad_ficha" => $fichaModel->getCantidad(),
      "raza_ficha" => $fichaModel->getRaza(),
      "descripcion_ficha" => $fichaModel->getDescripcion()
    ];
  }
}

?>
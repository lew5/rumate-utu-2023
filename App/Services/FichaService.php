<?php

class FichaService
{
  private $fichaRepository;

  public function __construct()
  {
    $this->fichaRepository = Container::resolve(FichaRepository::class);
  }

  public function getFichas()
  {
    return $this->fichaRepository->find();
  }

  public function getFichaById($id)
  {
    return $this->fichaRepository->findById($id);
  }

  public function createFicha($fichaModel)
  {
    $fichaAssocArray = $this->fichaToAssocArray($fichaModel);
    $this->fichaRepository->addFicha($fichaAssocArray);
    return $this->fichaRepository->lastInsertId();
  }

  public function updateFicha($id, $data)
  {
    $this->fichaRepository->updateFicha($id, $data);
  }

  public function deleteFicha($id)
  {
    $this->fichaRepository->deleteFicha($id);
  }

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
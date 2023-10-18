<?php

class LoteService
{
  private $loteRepository;
  private $fichaService;
  public function __construct()
  {
    $this->loteRepository = Container::resolve(LoteRepository::class);
    $this->fichaService = Container::resolve(FichaService::class);
  }

  public function getLotes()
  {
    return $this->loteRepository->find();
  }

  public function getLoteById($id)
  {
    return $this->loteRepository->find($id);
  }

  public function createLote($loteModel)
  {
    $fichaId = $this->fichaService->createFicha($loteModel->getFicha());
    $loteModel->setIdFicha($fichaId);
    $loteAssocArray = $this->loteToAssocArray($loteModel);
    $this->loteRepository->addLote($loteAssocArray);
    return $this->loteRepository->lastInsertId();
  }

  public function updateLote($id, $data)
  {
    $this->loteRepository->updateLote($id, $data);
  }

  public function deleteLote($id)
  {
    $this->loteRepository->beginTransaction();
    try {
      $fichaId = $this->loteRepository->getFichaId($id)->getIdFicha();
      $this->loteRepository->deleteLote($id);
      $this->fichaService->deleteFicha($fichaId);
      $this->loteRepository->commit();
    } catch (PDOException $e) {
      $this->loteRepository->rollback();
    } finally {
      $this->loteRepository->close();
    }
  }

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
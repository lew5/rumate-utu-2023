<?php
class RemateService
{
  private $remateRepository;
  private $lotePostulaRemateRepository;
  private $loteService;

  public function __construct()
  {
    $this->remateRepository = Container::resolve(RemateRepository::class);
    $this->lotePostulaRemateRepository = Container::resolve(LotePostulaRemateRepository::class);
    $this->loteService = Container::resolve(LoteService::class);
  }

  public function getRemates()
  {
    $remates = $this->remateRepository->find();
    foreach ($remates as $remate) {
      $remate->setFechaInicio(formatFecha($remate->getFechaInicio()));
      $remate->setFechaFinal(formatFecha($remate->getFechaFinal()));
    }
    return $remates;
  }

  public function getRemateById($id)
  {
    return $this->remateRepository->findById($id);
  }

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
      var_dump($e->errorInfo);
      $this->remateRepository->rollback();
      return false;
    } finally {
      $this->remateRepository->close();
    }
  }

  public function updateRemate($id, $remateModel)
  {
    $this->remateRepository->updateRemate($id, $remateModel);
  }

  public function deleteRemate($id)
  {
    $this->remateRepository->beginTransaction();
    try {
      $this->loteService->deleteLotesByRemate($id);
      $this->remateRepository->deleteRemate($id);
      $this->remateRepository->commit();
    } catch (PDOException $e) {
      $this->remateRepository->rollback();
    } finally {
      $this->remateRepository->close();
    }
  }

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
  private function insertLotesByRemate($lotes, $remateId)
  {
    foreach ($lotes as $loteModel) {
      $loteId = $this->loteService->createLote($loteModel);
      $this->lotePostulaRemateRepository->addLoteDeRemate([
        'id_remate_lote_postula_remate' => $remateId,
        'id_lote_lote_postula_remate' => $loteId,
      ]);
    }
  }
}
?>
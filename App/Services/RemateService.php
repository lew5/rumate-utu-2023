<?php

class RemateService implements IServiceInterface
{
  private $_remateRepository;
  private $_loteService;
  private $_lotePostulaRemateRepository;
  private $_fichaRepository;

  public function __construct()
  {
    $this->_remateRepository = Container::resolve(RemateRepository::class);
    $this->_loteService = Container::resolve(LoteService::class);
    $this->_lotePostulaRemateRepository = Container::resolve(LotePostulaRemateRepository::class);
    $this->_fichaRepository = Container::resolve(FichaRepository::class);
  }

  public function getById($id)
  {
    $result = null;
    try {
      $result = $this->_remateRepository->find($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }

  public function getAll()
  {
    $remates = $this->_remateRepository->findAll();
    foreach ($remates as $remate) {
      $remate->setFechaInicio(formatFecha($remate->getFechaInicio()));
      $remate->setFechaFinal(formatFecha($remate->getFechaFinal()));
    }
    return $remates;
  }

  public function create($remateModel)
  {
    $db = DataBase::get();
    $db->beginTransaction();
    try {
      $remateId = $this->_remateRepository->create($remateModel);
      foreach ($remateModel->getLotes() as $loteModel) {
        $loteId = $this->_loteService->create($loteModel);
        $lotePostulaRemate = Container::resolve(LotePostulaRemate::class);
        $lotePostulaRemate->setIdRemate($remateId);
        $lotePostulaRemate->setIdLote($loteId);
        $this->_lotePostulaRemateRepository->create($lotePostulaRemate);
      }
      $db->commit();
    } catch (PDOException $e) {
      $db->rollBack();
      var_dump($e);
    } finally {
      $db = null;
    }
  }

  public function update($model)
  {
    try {
      $this->_remateRepository->update($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  public function delete($id)
  {
    try {
      $this->_remateRepository->delete($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  public function getLotes($idRemate)
  {
    $lotes = $this->_remateRepository->getLotes($idRemate);
    foreach ($lotes as $lote) {
      $lote->setFicha($this->_fichaRepository->find($lote->getIdFicha()));
    }
    return $lotes;
  }

  public function getRemateConLotes($id)
  {
    $remate = null;
    try {
      $remate = $this->_remateRepository->find($id);
      $lotes = $this->_remateRepository->getLotes($id);
      foreach ($lotes as $lote) {
        $lote->setFicha($this->_fichaRepository->find($lote->getIdFicha()));
      }
      $remate->setLotes($lotes);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $remate;
  }
}
?>
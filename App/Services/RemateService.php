<?php

class RemateService implements IServiceInterface
{
  private $_remateRepository;
  private $_loteService;

  private $_lotePostulaRemateRepository;

  public function __construct()
  {
    $this->_remateRepository = Container::resolve(RemateRepository::class);
    $this->_loteService = Container::resolve(LoteService::class);
    $this->_lotePostulaRemateRepository = Container::resolve(LotePostulaRemateRepository::class);
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
    return $this->_remateRepository->findAll();
  }

  public function create($remateModel)
  {
    $db = DataBase::get();
    $db->beginTransaction();
    try {
      $remateId = $this->_remateRepository->create($remateModel);
      foreach ($remateModel->getLotes() as $loteModel) {
        var_dump($loteModel);
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
}
?>
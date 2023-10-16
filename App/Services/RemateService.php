<?php

class RemateService implements IServiceInterface
{
  private $_RemateRepository;

  public function __construct()
  {
    $this->_RemateRepository = Container::resolve(RemateRepository::class);
  }

  public function getById($id)
  {
    $result = null;
    try {
      $result = $this->_RemateRepository->find($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }

  public function getAll()
  {
    return $this->_RemateRepository->findAll();
  }

  public function create($model)
  {
    try {
      $this->_RemateRepository->create($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }

  public function update($model)
  {
    try {
      $this->_RemateRepository->update($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  public function delete($id)
  {
    try {
      $this->_RemateRepository->delete($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}
?>
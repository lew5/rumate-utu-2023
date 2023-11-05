<?php

class PujaService implements IServiceInterface
{
  private $_PujaRepository;

  public function __construct()
  {
    $this->_PujaRepository = Container::resolve(PujaRepository::class);
  }

  public function getById($id)
  {
    $result = null;
    try {
      $result = $this->_PujaRepository->find($id);
    } catch (PDOException $e) {
      // var_dump($e);
    }
    return $result;
  }

  public function getAll()
  {
    return $this->_PujaRepository->findAll();
  }

  public function create($model)
  {
    try {
      $this->_PujaRepository->create($model);
    } catch (PDOException $e) {
      // var_dump($e);
    }
  }

  public function update($model)
  {
    try {
      $this->_PujaRepository->update($model);
    } catch (PDOException $e) {
      // var_dump($e);
    }
  }
  public function delete($id)
  {
    try {
      $this->_PujaRepository->delete($id);
    } catch (PDOException $e) {
      // var_dump($e);
    }
  }
}
?>
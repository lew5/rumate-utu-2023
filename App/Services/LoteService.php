<?php

class LoteService
{
  private $_loteRepository;

  public function __construct()
  {
    $this->_loteRepository = Container::resolve(LoteRepository::class);
  }

  // OBTENER TODOS LOS LOTES
  public function getAll()
  {
    $result = [];
    try {
      $result = $this->_loteRepository->findAll();
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }
  // OBTENER UN LOTE
  public function get($id)
  {
    $result = null;
    try {
      $result = $this->_loteRepository->find($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
  }

  // CREAR UN LOTE
  public function create($model)
  {
    try {
      $this->_loteRepository->add($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }

  // ACTUALIZAR UN LOTE
  public function update($model)
  {
    try {
      $this->_loteRepository->update($model);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  // ELIMINAR UN LOTE
  public function delete($id)
  {
    try {
      $this->_loteRepository->remove($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
}
?>
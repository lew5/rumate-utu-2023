<?php

class LoteService
{
  private $_loteRepository;
  private $_fichaRepository;
  public function __construct()
  {
    $this->_loteRepository = Container::resolve(LoteRepository::class);
    $this->_fichaRepository = Container::resolve(FichaRepository::class);
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

  // CREAR UN LOTE CON SU FICHA
  public function create($loteModel)
  {
    $db = DataBase::get();
    $db->beginTransaction();
    try {
      $loteModel->setIdFicha($this->_fichaRepository->add($loteModel->getFicha()));
      $this->_loteRepository->add($loteModel);
      $db->commit();
    } catch (PDOException $e) {
      $db->rollback();
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }

  // ACTUALIZAR UN LOTE
  public function update($loteModel)
  {
    try {
      $this->_loteRepository->update($loteModel);
    } catch (PDOException $e) {
      var_dump($e);
    }
  }
  // ELIMINAR UN LOTE
  public function delete($idLote, $idFicha)
  {
    $db = DataBase::get();
    $db->beginTransaction();
    try {
      if ($this->_loteRepository->remove($idLote)->rowCount() == 0) {
        throw new PDOException();
      }
      if ($this->_fichaRepository->remove($idFicha)->rowCount() == 0) {
        throw new PDOException();
      }
      $db->commit();
      return true;
    } catch (PDOException $e) {
      $db->rollback();
      return false;
    } finally {
      $this->_db = null;
    }
  }

}
?>
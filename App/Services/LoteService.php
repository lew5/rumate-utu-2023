<?php

class LoteService implements IServiceInterface
{
  private $_loteRepository;
  private $_fichaRepository;
  public function __construct()
  {
    $this->_loteRepository = Container::resolve(LoteRepository::class);
    $this->_fichaRepository = Container::resolve(FichaRepository::class);
  }

  // OBTENER UN LOTE
  public function getById($id)
  {
    $result = null;
    try {
      $result = $this->_loteRepository->find($id);
    } catch (PDOException $e) {
      var_dump($e);
    }
    return $result;
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


  // CREAR UN LOTE CON SU FICHA
  public function create($loteModel)
  {
    $db = DataBase::get();
    $lastInsertId = null;
    $loteModel->setIdFicha($this->_fichaRepository->create($loteModel->getFicha()));
    $this->_loteRepository->create($loteModel);
    $lastInsertId = $db->lastInsertId();
    $db = null;
    return $lastInsertId;
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
  public function delete($loteModel)
  {
    $db = DataBase::get();
    $idLote = $loteModel->getId();
    $idFicha = $loteModel->getIdFicha();
    $db->beginTransaction();
    try {
      if ($this->_loteRepository->delete($idLote)->rowCount() == 0) {
        throw new PDOException();
      }
      if ($this->_fichaRepository->delete($idFicha)->rowCount() == 0) {
        throw new PDOException();
      }
      $db->commit();
      return true;
    } catch (PDOException $e) {
      $db->rollback();
      return false;
    } finally {
      $db = null;
    }
  }

}
?>
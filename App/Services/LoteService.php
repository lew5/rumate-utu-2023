<?php

class LoteService 
{
  private $loteRepository;
  private $fichaRepository;
  private $categoriaRepository;
  public function __construct()
  {
    $this->loteRepository = Container::resolve(LoteRepository::class);
    $this->fichaRepository = Container::resolve(FichaRepository::class);
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
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
    $this->loteRepository->beginTransaction();
    try {
      //code...
    } catch (\Throwable $th) {
      //throw $th;
    }

    $fichaId = $this->fichaRepository->addFicha($loteModel->getFicha())
    $loteModel->setIdFicha($fichaId);
    return $this->loteRepository->addLote($loteModel);
  }

  // public function update($loteModel)
  // {
  //   try {
  //     $this->_loteRepository->update($loteModel);
  //   } catch (PDOException $e) {
  //     var_dump($e);
  //   }
  // }
  // public function delete($loteModel)
  // {
  //   $db = DataBase::get();
  //   $idLote = $loteModel->getId();
  //   $idFicha = $loteModel->getIdFicha();
  //   $db->beginTransaction();
  //   try {
  //     if ($this->_loteRepository->delete($idLote)->rowCount() == 0) {
  //       throw new PDOException();
  //     }
  //     if ($this->_fichaRepository->delete($idFicha)->rowCount() == 0) {
  //       throw new PDOException();
  //     }
  //     $db->commit();
  //     return true;
  //   } catch (PDOException $e) {
  //     $db->rollback();
  //     return false;
  //   } finally {
  //     $db = null;
  //   }
  // }

  // public function getCategoria($id)
  // {
  //   return $this->_categoriaRepository->find($id);
  // }
  // public function getFicha($id)
  // {
  //   return $this->_fichaRepository->find($id);
  // }
}
?>

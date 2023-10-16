<?php

class CategoriaRepository implements IRepositoryInterface
{
  private $_db;

  // OBTENER UNA CATEGORIA
  public function find($id)
  {
    $this->_db = DataBase::get();
    $result = null;

    $stm = $this->_db->prepare(
      "SELECT * FROM categorias
        WHERE id_categoria = :id"
    );
    $stm->execute([
      'id' => $id
    ]);

    $data = $stm->fetchObject("Categoria");

    if ($data) {
      $result = $data;
    }

    $this->_db = null;

    return $result;
  }

  // OBTENER TODAS LAS CATEGORIAS
  public function findAll()
  {
    $this->_db = DataBase::get();
    $result = [];

    $stm = $this->_db->prepare("SELECT * FROM categorias");
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_CLASS, "Categoria");

    $this->_db = null;

    return $result;
  }

  public function create($model)
  {
  }
  public function update($model)
  {
  }
  public function delete($id)
  {
  }
}
?>
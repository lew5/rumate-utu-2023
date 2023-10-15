<?php

class CategoriaRepository
{
  private $_db;

  public function __construct()
  {
    $this->_db = DataBase::get();
  }

  // OBTENER TODAS LAS CATEGORIAS
  public function findAll()
  {
    $result = [];

    $stm = $this->_db->prepare("SELECT * FROM categorias");
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_CLASS, "Categoria");

    $this->_db = null;

    return $result;
  }
  // OBTENER UNA CATEGORIA
  public function find($id)
  {
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
}
?>
<?php

class CategoriaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("categorias","id_categoria","Categoria");
  }

  public function find()
  {
    return $this->read();
  }

  public function findById($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  public function addCategoria($data)
  {
    $this->create($data);
  }

  public function updateCategoria($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteCategoria($id)
  {
    $this->delete($id);
  }
}
?>

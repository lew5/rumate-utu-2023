<?php

class CategoriaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("categorias");
  }

  public function find()
  {
    return $this->read("Categoria");
  }

  public function findById($id)
  {
    return $this->read(
      "Categoria",
      [
        'id_categoria' => $id
      ]
    );
  }

  public function addCategoria($data)
  {
    $this->create($data);
  }

  public function updateCategoria($id, $data)
  {
    $this->update("id_categoria", $id, $data);
  }

  public function deleteCategoria($id)
  {
    $this->delete("id_categoria", $id);
  }
}
?>

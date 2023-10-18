<?php

class FichaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("fichas");
  }

  public function find()
  {
    return $this->read("Ficha");
  }

  public function findById($id)
  {
    return $this->read(
      "Ficha",
      [
        'id_ficha' => $id
      ]
    );
  }

  public function addFicha($data)
  {
    $this->create($data);
  }

  public function updateFicha($id, $data)
  {
    $this->update("id_ficha", $id, $data);
  }

  public function deleteFicha($id)
  {
    $this->delete("id_ficha", $id);
  }
}
?>

<?php

class FichaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("fichas","id_ficha","Ficha");
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

  public function addFicha($data)
  {
    $this->create($data);
  }

  public function updateFicha($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteFicha($id)
  {
    $this->delete($id);
  }
}
?>

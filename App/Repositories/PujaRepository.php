<?php

class PujaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("pujas","id_puja","Puja");
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

  public function addPuja($data)
  {
    $this->create($data);
  }

  public function updatePuja($id, $data)
  {
    $this->update($id, $data);
  }

  public function deletePuja($id)
  {
    $this->delete($id);
  }
}
?>

<?php

class RemateRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("remates", "id_remate", "Remate");
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

  public function findByTitle($tituloRemate)
  {
    return $this->search($tituloRemate, "titulo_remate");
  }

  public function addRemate($data)
  {
    $this->create($data);
  }

  public function updateRemate($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteRemate($id)
  {
    $this->delete($id);
  }
}
?>
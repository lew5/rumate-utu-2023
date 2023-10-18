<?php

class LoteRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("lotes");
  }

  public function find()
  {
    return $this->read("Lote");
  }

  public function findById($id)
  {
    return $this->read(
      "Lote",
      [
        'id_lote' => $id
      ]
    );
  }

  public function addLote($data)
  {
    $this->create($data);
  }

  public function updateLote($id, $data)
  {
    $this->update("id_lote", $id, $data);
  }

  public function deleteLote($id)
  {
    $this->delete("id_lote", $id);
  }
}
?>

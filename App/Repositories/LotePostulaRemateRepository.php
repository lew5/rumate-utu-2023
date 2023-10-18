<?php

class LotePostulaRemateRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("lotes_postulan_remates","id_remate_lote_postula_remate","LotePostulaRemate");
  }

  public function find()
  {
    return $this->read();
  }

  public function findByRemateId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  public function addLoteToRemate($data)
  {
    $this->create($data);
  }

  public function updateLoteToRemate($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteLoteToRemate($id)
  {
    $this->delete($id);
  }
}
?>

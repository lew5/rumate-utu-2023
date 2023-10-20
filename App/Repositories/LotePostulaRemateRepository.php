<?php

class LotePostulaRemateRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("lotes_postulan_remates", "id_remate_lote_postula_remate", "LotePostulaRemate");
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

  public function findLotesByRemateId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ],
      "id_lote_lote_postula_remate"
    );
  }

  public function addLoteDeRemate($data)
  {
    $this->create($data);
  }

  public function updateLoteDeRemate($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteLoteDeRemate($id)
  {
    $this->delete($id);
  }
}
?>
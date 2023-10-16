<?php

class LotePostulaRemateRepository extends BaseRepository implements IRepositoryInterface
{
  private $_db;
  private $table = "lotes_postulan_remates";
  private $obj = "LotePostulaRemate";

  public function find($idRemate)
  {
    return $this->readOne($idRemate, $this->table, "id_remate_lote_postula_remate", $this->obj);
  }

  public function findAll()
  {
    return $this->readAll($this->table, $this->obj);
  }

  public function create($lotePostulaRemateModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO LOTES_POSTULAN_REMATES (
        id_remate_lote_postula_remate,
        id_lote_lote_postula_remate
      ) 
      VALUES (
        :id_remate,
        :id_lote
      )"
    );
    $stm->execute([
      'id_remate' => $lotePostulaRemateModel->getIdRemate(),
      'id_lote' => $lotePostulaRemateModel->getIdLote()
    ]);
    $this->_db = null;
  }

  public function update($model)
  {
    // Implementa la lógica de actualización si es necesario
  }

  public function delete($idRemate)
  {
    return $this->deleteOne($idRemate, $this->table, "id_remate_lote_postula_remate");
  }
}


?>
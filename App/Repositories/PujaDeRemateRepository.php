<?php
class PujaDeRemateRepository extends BaseRepository implements IRepositoryInterface
{
  private $_db;
  private $table = "pujas_de_remates";
  private $obj = "PujaDeRemate";

  public function find($id)
  {
    return $this->readOne($id, $this->table, "id_puja_puja_de_remate", $this->obj);
  }

  public function findAll()
  {
    return $this->readAll($this->table, $this->obj);
  }

  public function create($pujaDeRemateModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO PUJAS_DE_REMATES (
        id_puja_puja_de_remate,
        id_remate_puja_de_remate,
        id_lote_puja_de_remate
      ) 
      VALUES (
        :idPuja,
        :idRemate,
        :idLote
      )"
    );
    $stm->execute([
      'idPuja' => $pujaDeRemateModel->getIdPuja(),
      'idRemate' => $pujaDeRemateModel->getIdRemate(),
      'idLote' => $pujaDeRemateModel->getIdLote()
    ]);
    $this->_db = null;
  }

  public function update($model)
  {
  }

  public function delete($id)
  {
    return $this->deleteOne($id, $this->table, "id_puja_puja_de_remate");
  }
}

?>
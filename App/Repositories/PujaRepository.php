<?php
class PujaRepository extends BaseRepository implements IRepositoryInterface
{
  private $_db;
  private $table = "pujas";
  private $obj = "Puja";

  public function find($id)
  {
    return $this->readOne($id, $this->table, "id_puja", $this->obj);
  }

  public function findAll()
  {
    return $this->readAll($this->table, $this->obj);
  }

  public function create($pujaModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO PUJAS (
        monto_puja
      ) 
      VALUES (
        :monto
      )"
    );
    $stm->execute([
      'monto' => $pujaModel->getMonto()
    ]);
    $this->_db = null;
  }

  public function update($model)
  {

  }

  public function delete($id)
  {
    return $this->deleteOne($id, $this->table, "id_puja");
  }
}

?>
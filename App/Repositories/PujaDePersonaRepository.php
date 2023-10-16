<?php
class PujaDePersonaRepository extends BaseRepository implements IRepositoryInterface
{
  private $_db;
  private $table = "pujas_de_personas";
  private $obj = "PujaDePersona";

  public function find($id)
  {
    return $this->readOne($id, $this->table, "id_puja_puja_de_persona", $this->obj);
  }

  public function findAll()
  {
    return $this->readAll($this->table, $this->obj);
  }

  public function create($pujaDePersonaModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO PUJAS_DE_PERSONAS (
        id_puja_puja_de_persona,
        id_persona_puja_de_persona
      ) 
      VALUES (
        :id_puja,
        :id_persona
      )"
    );
    $stm->execute([
      'id_puja' => $pujaDePersonaModel->getIdPuja(),
      'id_persona' => $pujaDePersonaModel->getIdPersona()
    ]);
    $this->_db = null;
  }

  public function update($model)
  {
    // Implementa la lógica de actualización si es necesario
  }

  public function delete($id)
  {
    return $this->deleteOne($id, $this->table, "id_puja_puja_de_persona");
  }
}

?>
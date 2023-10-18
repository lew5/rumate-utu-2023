<?php

class PujaDePersonaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("pujas_de_personas","id_puja_puja_de_persona","PujaDePersona");
  }

  public function find()
  {
    return $this->read();
  }

  public function findByPujaId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  public function addPujaDePersona($data)
  {
    $this->create($data);
  }

  public function updatePujaDePersona($id, $data)
  {
    $this->update($id, $data);
  }

  public function deletePujaDePersona($id)
  {
    $this->delete($id);
  }
}
?>

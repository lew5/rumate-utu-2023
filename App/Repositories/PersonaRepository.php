<?php

class PersonaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("personas","id_persona","Persona");
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

  public function addPersona($data)
  {
    $this->create($data);
  }

  public function updatePersona($id, $data)
  {
    $this->update($id, $data);
  }

  public function deletePersona($id)
  {
    $this->delete($id);
  }
}

?>

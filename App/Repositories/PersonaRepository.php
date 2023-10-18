<?php

class PersonaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("personas");
  }

  public function find()
  {
    return $this->read("Persona");
  }
  
  public function findById($id)
  {
    return $this->read(
      "Persona",
      [
        'id_persona' => $id
      ]
    );
  }

  public function addPersona($data)
  {
    $this->create($data);
  }

  public function updatePersona($id, $data)
  {
    $this->update("id_persona", $id, $data);
  }

  public function deletePersona($id)
  {
    $this->delete("id_persona", $id);
  }
}

?>

<?php

class UsuarioDePersonaRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("usuarios_de_personas","id_usuario_usuarios_de_personas","UsuarioDePersona");
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

  public function addUsuarioDePersona($data)
  {
    $this->create($data);
  }

  public function updateUsuarioDePersona($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteUsuarioDePersona($id)
  {
    $this->delete($id);
  }
}
?>

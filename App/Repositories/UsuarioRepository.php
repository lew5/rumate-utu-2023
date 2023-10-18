<?php

class UsuarioRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("usuarios");
  }

  public function findById($id)
  {
    return $this->read(
      "Usuario",
      [
        'id_usuario' => $id
      ]
    );
  }

  public function findByUsername($username)
  {
    return $this->read(
      "Usuario",
      [
        'username_usuario' => $username
      ]
    );
  }

  public function addUsuario($data)
  {
    $this->create($data);
  }

  public function updateUsuario($id, $data)
  {
    $this->update("id_usuario", $id, $data);
  }

  public function deleteUsuario($id)
  {
    $this->delete("id_usuario", $id);
  }
}
?>

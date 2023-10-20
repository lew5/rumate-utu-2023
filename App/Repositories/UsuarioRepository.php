<?php

class UsuarioRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("usuarios", "id_usuario", "Usuario");
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

  public function findByUsername($username)
  {
    return $this->read(
      [
        'username_usuario' => $username
      ]
    );
  }

  public function findByTipo($tipo)
  {
    return $this->read(
      [
        'tipo_usuario' => $tipo
      ]
    );
  }
  public function addUsuario($data)
  {
    $this->create($data);
  }

  public function updateUsuario($id, $data)
  {
    $this->update($id, $data);
  }

  public function deleteUsuario($id)
  {
    $this->delete($id);
  }
}
?>
<?php

class UsuarioRepository extends Repository
{
  public function __construct()
  {
    parent::__construct(DataBase::get(), "usuarios");
  }

  public function findById($id)
  {
    $this->db = DataBase::get();
    return $this->read(
      "Usuario",
      [
        'id_usuario' => $id
      ]
    );
  }

  public function findByUsername($username)
  {
    $this->db = DataBase::get();
    return $this->read(
      "Usuario",
      [
        'username_usuario' => $username
      ]
    );
  }

  public function addUsuario($data)
  {
    $this->db = DataBase::get();
    $this->create($data);
  }


  public function updateUsuario($id, $data)
  {
    $this->db = DataBase::get();
    $this->update("id_usuario", $id, $data);
  }

  public function deleteUsuario($id)
  {
    $this->db = DataBase::get();
    $this->delete("id_usuario", $id);
  }
}
?>
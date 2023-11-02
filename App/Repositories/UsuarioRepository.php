<?php

class UsuarioRepository extends QueryBuilder
{

  public function find()
  {
    return $this->select()
      ->from("usuarios")
      ->executeSelect();
  }

  public function findById($id)
  {
    return $this->select()
      ->from("usuarios")
      ->where("id_usuario = :id")
      ->executeSelect(['id' => $id]);
  }

  public function findByUsername($username)
  {
    return $this->select()
      ->from("usuarios")
      ->where("username_usuario = :username")
      ->executeSelect(['username' => $username]);
  }

  public function findByTipo($tipo)
  {
    return $this->select()
      ->from("usuarios")
      ->where("tipo_usuario = :tipo")
      ->executeSelect(['tipo' => $tipo]);
  }
  public function addUsuario($data)
  {
    return $this->insert("usuarios", $data);
  }

  public function updateUsuario($data)
  {
    return $this->update("usuarios", $data)->where("id_usuario = :id")->executeUpdate(["id" => 1]);
  }

  // public function deleteUsuario($id)
  // {
  //   $this->delete($id);
  // }
}
?>
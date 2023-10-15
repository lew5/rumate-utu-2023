<?php

class UsuarioRepository
{
  private $_db;

  public function __construct()
  {
    $this->_db = DataBase::get();
  }

  // OBTENER TODOS LOS USUARIOS
  public function findAll()
  {
    $result = [];

    $stm = $this->_db->prepare("SELECT * FROM usuarios");
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_CLASS, "Usuario");

    $this->_db = null;

    return $result;
  }
  // OBTENER UN USUARIO
  public function find($username)
  {
    $result = null;

    $stm = $this->_db->prepare(
      "SELECT * FROM usuarios
        WHERE username_usuario = :username"
    );
    $stm->execute([
      'username' => $username
    ]);

    $data = $stm->fetchObject("Usuario");

    if ($data) {
      $result = $data;
    }

    $this->_db = null;

    return $result;
  }

  // CREAR UN USUARIO
  public function add($model)
  {
    $stm = $this->_db->prepare(
      "INSERT INTO usuarios (
          username_usuario,
          password_usuario,
          email_usuario,
          tipo_usuario) 
        VALUES (:username,:password,:email,:tipo)"
    );
    $stm->execute([
      'username' => $model->getUsername(),
      'password' => $model->getPassword(),
      'email' => $model->getEmail(),
      'tipo' => $model->getTipo(),
    ]);

    $this->_db = null;
  }

  // ACTUALIZAR UN USUARIO
  public function update($model)
  {
    $stm = $this->_db->prepare(
      "UPDATE usuarios
        SET 
          password_usuario = :password,
          email_usuario = :email,
          tipo_usuario = :tipo
        WHERE username_usuario = :username"
    );
    $stm->execute([
      'username' => $model->getUsername(),
      'password' => $model->getPassword(),
      'email' => $model->getEmail(),
      'tipo' => $model->getTipo(),
    ]);

    $this->_db = null;
  }
  // ELIMINAR UN USUARIO
  public function remove($username)
  {
    $stm = $this->_db->prepare(
      "DELETE FROM usuarios WHERE username_usuario = :username"
    );
    $stm->execute([
      'username' => $username,
    ]);

    $this->_db = null;
  }
}
?>
<?php

class FichaRepository
{
  private $_db;

  public function __construct()
  {
    $this->_db = DataBase::get();
  }

  // OBTENER TODOS LOS FICHAS
  public function findAll()
  {
    $result = [];

    $stm = $this->_db->prepare("SELECT * FROM fichas");
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_CLASS, "Ficha");

    $this->_db = null;

    return $result;
  }
  // OBTENER UNA FICHA
  public function find($id)
  {
    $result = null;

    $stm = $this->_db->prepare(
      "SELECT * FROM fichas
        WHERE id_ficha = :id"
    );
    $stm->execute([
      'id' => $id
    ]);

    $data = $stm->fetchObject("Ficha");

    if ($data) {
      $result = $data;
    }

    $this->_db = null;

    return $result;
  }

  // CREAR UNA FICHA
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

  // ACTUALIZAR UNA FICHA
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
  // ELIMINAR UNA FICHA
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
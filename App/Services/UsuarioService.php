<?php

class UsuarioService
{
  private $_db;

  public function __construct()
  {
    $this->_db = DataBase::get();
  }

  //Obtener todos los usuarios
  public function getAll()
  {
    $result = [];
    try {
      $stm = $this->_db->prepare("SELECT * FROM usuarios");
      $stm->execute();
      $result = $stm->fetchAll(PDO::FETCH_CLASS, "Usuario");
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
      return $result;
    }
  }
  //Obtener todos los usuarios
  public function get($username)
  {
    $result = null;
    try {
      $stm = $this->_db->prepare("SELECT * FROM usuarios WHERE username_usuario = :username");
      $stm->execute([
        'username' => $username
      ]);
      $data = $stm->fetchObject("Usuario");
      if ($data) {
        $result = $data;
      }
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
      return $result;
    }
  }
  public function create($model)
  {
    try {
      $stm = $this->_db->prepare(
        "INSERT INTO usuarios 
        (username_usuario,password_usuario,email_usuario,tipo_usuario) VALUES (:username,:password,:email,:tipo)"
      );
      $stm->execute([
        'username' => $model->getUsername(),
        'password' => $model->getPassword(),
        'email' => $model->getEmail(),
        'tipo' => $model->getTipo(),
      ]);
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }

  public function delete($model)
  {
    try {
      $stm = $this->_db->prepare(
        "INSERT INTO usuarios 
        (username_usuario,password_usuario,email_usuario,tipo_usuario) VALUES (:username,:password,:email,:tipo)"
      );
      $stm->execute([
        'username' => $model->getUsername(),
        'password' => $model->getPassword(),
        'email' => $model->getEmail(),
        'tipo' => $model->getTipo(),
      ]);
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }
}
?>
<?php

class UsuarioRepository
{
  private $_db;
  // OBTENER TODOS LOS USUARIOS
  public function findAll()
  {
    $this->_db = DataBase::get();
    $result = [];
    try {
      $stm = $this->_db->prepare("SELECT * FROM usuarios");
      $stm->execute();
      $result = $stm->fetchAll(PDO::FETCH_CLASS, "Usuario");
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }
  // OBTENER UN USUARIO
  public function find($username)
  {
    $this->_db = DataBase::get();
    try {
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
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }

  // CREAR UN USUARIO
  public function add($model)
  {
    $this->_db = DataBase::get();
    try {
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

    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }

  // ACTUALIZAR UN USUARIO
  public function update($model)
  {
    $this->_db = DataBase::get();
    try {
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
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }
  // ELIMINAR UN USUARIO
  public function remove($username)
  {
    $this->_db = DataBase::get();
    try {
      $stm = $this->_db->prepare(
        "DELETE FROM usuarios WHERE username_usuario = :username"
      );
      $stm->execute([
        'username' => $username,
      ]);
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
  }
}

// try {

// } catch (PDOException $e) {
//   var_dump($e);
// } finally {

// }
?>
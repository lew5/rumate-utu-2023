<?php

class FichaRepository implements IRepositoryInterface
{
  private $_db;

  // OBTENER UNA FICHA
  public function find($id)
  {
    $this->_db = DataBase::get();
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

  // OBTENER TODOS LOS FICHAS
  public function findAll()
  {
    $this->_db = DataBase::get();
    $result = [];

    $stm = $this->_db->prepare("SELECT * FROM fichas");
    $stm->execute();

    $result = $stm->fetchAll(PDO::FETCH_CLASS, "Ficha");

    $this->_db = null;

    return $result;
  }


  // CREAR UNA FICHA
  public function create($fichaModel)
  {
    $this->_db = DataBase::get();
    $lastInsertId = null;

    $stm = $this->_db->prepare(
      "INSERT INTO fichas (
          peso_ficha,
          cantidad_ficha,
          raza_ficha,
          descripcion_ficha) 
        VALUES (
          :peso,
          :cantidad,
          :raza,
          :descripcion)"
    );
    $stm->execute([
      'peso' => $fichaModel->getPeso(),
      'cantidad' => $fichaModel->getCantidad(),
      'raza' => $fichaModel->getRaza(),
      'descripcion' => $fichaModel->getDescripcion(),
    ]);
    $lastInsertId = $this->_db->lastInsertId();
    $this->_db = null;

    return $lastInsertId;
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
  public function delete($idFicha)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "DELETE FROM fichas WHERE id_ficha = :id"
    );
    $stm->execute([
      'id' => $idFicha
    ]);
    $this->_db = null;
    return $stm;
  }
}
?>
<?php

class Remate extends Database
{
  private $id;
  private $empleado;
  private $estado;

  public function insert($idEmpleado, $estado = null)
  {
    if ($estado != null) {
      $this->query("INSERT INTO remate (empleado,estado) VALUES (:id_empleado,:estado)", [
        'id_empleado' => $idEmpleado,
        'estado' => $estado
      ]);
    } else {
      $this->query("INSERT INTO remate (empleado) VALUES (:id_empleado)", [
        'id_empleado' => $idEmpleado
      ]);
    }
  }

  public function delete($idRemate)
  {
    $this->query("DELETE FROM remate WHERE id = :idRemate", [
      'idRemate' => $idRemate
    ]);
  }

  public function update($idRemate, $estado)
  {
    $this->query("UPDATE remate SET estado = '$estado' WHERE id = :idRemate
", [
      'idRemate' => $idRemate
    ]);
  }

  public function getById($idRemate)
  {
    return $this->query("SELECT * FROM remate WHERE id = :idRemate", [
      'idRemate' => $idRemate
    ])->find();
  }

  public function getAll()
  {
    return $this->query("SELECT * FROM remate")->get();
  }
}


?>
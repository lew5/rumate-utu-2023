<?php

class Empleado extends Database
{
  private $id;
  private $permiso;

  public function insert($idEmpleado, $idPermiso)
  {
    $this->query("INSERT INTO empleado (id,permiso) VALUES (:idEmpleado,:idPermiso)", [
      'idEmpleado' => $idEmpleado,
      'idPermiso' => $idPermiso
    ]);
  }

  public function delete($idEmpleado)
  {
    $this->query("DELETE FROM empleado WHERE id = :idEmpleado", [
      'idEmpleado' => $idEmpleado
    ]);
  }

  public function update($idEmpleado, $idPermiso)
  {
    $this->query("UPDATE empleado SET permiso = '$idPermiso' WHERE id = :idEmpleado", [
      'idEmpleado' => $idEmpleado
    ]);
  }

  public function getById($idEmpleado)
  {
    return $this->query("SELECT * FROM empleado WHERE id = :idEmpleado", [
      'idEmpleado' => $idEmpleado
    ])->find();
  }

  public function getAll()
  {
    return $this->query("SELECT * FROM empleado")->get();
  }
}



?>
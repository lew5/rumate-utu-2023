<?php

class Permiso extends Database
{
  private $id;
  private $nombre;

  public function insert($nombre)
  {
    $this->query("INSERT INTO permiso (nombre) VALUES (:nombre)", [
      'nombre' => $nombre,
    ]);
  }

  public function delete($idPermiso)
  {
    $this->query("DELETE FROM permiso WHERE id = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  public function update($idPermiso, $nombre)
  {
    $this->query("UPDATE empleado SET permiso = '$nombre' WHERE id = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  public function getById($idPermiso)
  {
    return $this->query("SELECT * FROM permiso WHERE id = :idPermiso", [
      'idPermiso' => $idPermiso
    ])->find();
  }

  public function getAll()
  {
    return $this->query("SELECT * FROM permiso")->get();
  }
}


?>
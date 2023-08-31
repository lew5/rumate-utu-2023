<?php
/**
 * La clase Permiso se encarga de gestionar los permisos en la base de datos.
 */
class Permiso extends Database
{
  private $idPermiso;
  private $nombrePermiso;


  public function insert($nombrePermiso)
  {
    $this->query("INSERT INTO permisos (nombrePermiso) VALUES (:nombrePermiso)", [
      'nombrePermiso' => $nombrePermiso,
    ]);
  }


  public function delete($idPermiso)
  {
    $this->query("DELETE FROM permisos WHERE idPermiso = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  public function update($idPermiso, $nombrePermiso)
  {
    $this->query("UPDATE permisos SET nombrePermiso = '$nombrePermiso' WHERE idPermiso = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  public function getById($idPermiso)
  {
    return $this->query("SELECT * FROM permisos WHERE idPermiso = :idPermiso", [
      'idPermiso' => $idPermiso
    ])->find();
  }

  /**
   * Obtiene todos los registros de permisos de la base de datos.
   *
   * @return array Conjunto de registros de permisos.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM permisos")->get();
  }
}
?>
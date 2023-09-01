<?php
/**
 * La clase Permiso se encarga de gestionar los permisos en la base de datos.
 */
class Permiso extends Database
{
  /**
   * @var int $idPermiso Identificador único del permiso.
   */
  private $idPermiso;

  /**
   * @var string $nombrePermiso Nombre descriptivo del permiso.
   */
  private $nombrePermiso;

  /**
   * Inserta un nuevo registro de permiso en la base de datos.
   *
   * @param string $nombrePermiso El nombre descriptivo del permiso.
   */
  public function insert($nombrePermiso)
  {
    $this->query("INSERT INTO permisos (nombrePermiso) VALUES (:nombrePermiso)", [
      'nombrePermiso' => $nombrePermiso,
    ]);
  }

  /**
   * Elimina un registro de permiso de la base de datos.
   *
   * @param int $idPermiso Identificador único del permiso a eliminar.
   */
  public function delete($idPermiso)
  {
    $this->query("DELETE FROM permisos WHERE idPermiso = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  /**
   * Actualiza el nombre de un permiso en la base de datos.
   *
   * @param int $idPermiso Identificador único del permiso a actualizar.
   * @param string $nombrePermiso El nuevo nombre descriptivo del permiso.
   */
  public function update($idPermiso, $nombrePermiso)
  {
    $this->query("UPDATE permisos SET nombrePermiso = '$nombrePermiso' WHERE idPermiso = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  /**
   * Obtiene un registro de permiso por su identificador único.
   *
   * @param int $idPermiso Identificador único del permiso.
   * @return array|null El registro de permiso encontrado o null si no se encuentra.
   */
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
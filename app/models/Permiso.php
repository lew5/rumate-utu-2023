<?php
/**
 * La clase Permiso se encarga de gestionar los permisos en la base de datos.
 */
class Permiso extends Database
{
  /**
   * @var int $id ID del permiso.
   * @var string $nombre Nombre del permiso.
   */

  private $id;
  private $nombre;

  /**
   * Inserta un nuevo registro de permiso en la base de datos.
   *
   * @param string $nombre Nombre del permiso a insertar.
   * @return void
   */
  public function insert($nombre)
  {
    $this->query("INSERT INTO permiso (nombre) VALUES (:nombre)", [
      'nombre' => $nombre,
    ]);
  }

  /**
   * Elimina un registro de permiso de la base de datos.
   *
   * @param int $idPermiso ID del permiso a eliminar.
   * @return void
   */
  public function delete($idPermiso)
  {
    $this->query("DELETE FROM permiso WHERE id = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  /**
   * Actualiza el nombre de un registro de permiso en la base de datos.
   *
   * @param int $idPermiso ID del permiso a actualizar.
   * @param string $nombre Nuevo nombre para el permiso.
   * @return void
   */
  public function update($idPermiso, $nombre)
  {
    $this->query("UPDATE permiso SET nombre = '$nombre' WHERE id = :idPermiso", [
      'idPermiso' => $idPermiso
    ]);
  }

  /**
   * Obtiene un registro de permiso por su ID.
   *
   * @param int $idPermiso ID del permiso a buscar.
   * @return array|null Registro del permiso encontrado o null si no se encuentra.
   */
  public function getById($idPermiso)
  {
    return $this->query("SELECT * FROM permiso WHERE id = :idPermiso", [
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
    return $this->query("SELECT * FROM permiso")->get();
  }
}
?>
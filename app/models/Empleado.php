<?php
/**
 * La clase Empleado se encarga de gestionar los empleados y sus permisos en la base de datos.
 */
class Empleado extends Database
{
  /**
   * @var int $id ID del empleado.
   * @var int $permiso ID del permiso asignado al empleado.
   */

  private $id;
  private $permiso;

  /**
   * Inserta un nuevo registro de empleado en la base de datos.
   *
   * @param int $idEmpleado ID del empleado a insertar.
   * @param int $idPermiso ID del permiso asignado al empleado.
   * @return void
   */
  public function insert($idEmpleado, $idPermiso)
  {
    $this->query("INSERT INTO empleado (id, permiso) VALUES (:idEmpleado, :idPermiso)", [
      'idEmpleado' => $idEmpleado,
      'idPermiso' => $idPermiso
    ]);
  }

  /**
   * Elimina un registro de empleado de la base de datos.
   *
   * @param int $idEmpleado ID del empleado a eliminar.
   * @return void
   */
  public function delete($idEmpleado)
  {
    $this->query("DELETE FROM empleado WHERE id = :idEmpleado", [
      'idEmpleado' => $idEmpleado
    ]);
  }

  /**
   * Actualiza el permiso de un registro de empleado en la base de datos.
   *
   * @param int $idEmpleado ID del empleado a actualizar.
   * @param int $idPermiso Nuevo ID de permiso asignado al empleado.
   * @return void
   */
  public function update($idEmpleado, $idPermiso)
  {
    $this->query("UPDATE empleado SET permiso = '$idPermiso' WHERE id = :idEmpleado", [
      'idEmpleado' => $idEmpleado
    ]);
  }

  /**
   * Obtiene un registro de empleado por su ID.
   *
   * @param int $idEmpleado ID del empleado a buscar.
   * @return array|null Registro del empleado encontrado o null si no se encuentra.
   */
  public function getById($idEmpleado)
  {
    return $this->query("SELECT * FROM empleado WHERE id = :idEmpleado", [
      'idEmpleado' => $idEmpleado
    ])->find();
  }

  /**
   * Obtiene todos los registros de empleados de la base de datos.
   *
   * @return array Conjunto de registros de empleados.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM empleado")->get();
  }
}
?>
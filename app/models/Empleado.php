<?php
/**
 * La clase Empleado se encarga de gestionar los empleados y sus permisos en la base de datos.
 */
class Empleado extends Database
{
  /**
   * @var int $idPersonaEmpleado Identificador de la persona asociada al empleado.
   */
  private $idPersonaEmpleado;

  /**
   * @var int $idPermisoEmpleado Identificador del permiso asociado al empleado.
   */
  private $idPermisoEmpleado;

  /**
   * Inserta un nuevo registro de empleado en la base de datos.
   *
   * @param int $idPersonaEmpleado Identificador de la persona asociada al empleado.
   * @param int $idPermisoEmpleado Identificador del permiso asociado al empleado.
   */
  public function insert($idPersonaEmpleado, $idPermisoEmpleado)
  {
    $this->query("INSERT INTO empleados (idPersona_empleado, idPermiso_empleado) VALUES (:idPersonaEmpleado, :idPermisoEmpleado)", [
      'idPersonaEmpleado' => $idPersonaEmpleado,
      'idPermisoEmpleado' => $idPermisoEmpleado
    ]);
  }

  /**
   * Elimina un registro de empleado de la base de datos.
   *
   * @param int $idPersonaEmpleado Identificador de la persona asociada al empleado a eliminar.
   */
  public function delete($idPersonaEmpleado)
  {
    $this->query("DELETE FROM empleados WHERE idPersona_empleado = :idPersonaEmpleado", [
      'idPersonaEmpleado' => $idPersonaEmpleado
    ]);
  }

  /**
   * Actualiza el permiso de un empleado en la base de datos.
   *
   * @param int $idPersonaEmpleado Identificador de la persona asociada al empleado cuyo permiso se actualizará.
   * @param int $idPermisoEmpleado Nuevo identificador de permiso para el empleado.
   */
  public function update($idPersonaEmpleado, $idPermisoEmpleado)
  {
    $this->query("UPDATE empleados SET idPermiso_empleado = '$idPermisoEmpleado' WHERE idPersona_empleado = :idPersonaEmpleado", [
      'idPersonaEmpleado' => $idPersonaEmpleado
    ]);
  }

  /**
   * Obtiene un registro de empleado por su identificador de persona.
   *
   * @param int $idPersonaEmpleado Identificador de la persona asociada al empleado.
   * @return array|null El registro de empleado encontrado o null si no se encuentra.
   */
  public function getById($idPersonaEmpleado)
  {
    return $this->query("SELECT * FROM empleados WHERE idPermiso_empleado = :idPersonaEmpleado", [
      'idPersonaEmpleado' => $idPersonaEmpleado
    ])->find();
  }

  /**
   * Obtiene todos los registros de empleados de la base de datos.
   *
   * @return array Conjunto de registros de empleados.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM empleados")->get();
  }
}
?>
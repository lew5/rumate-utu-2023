<?php
/**
 * La clase Remate se encarga de gestionar los remates y sus estados en la base de datos.
 */
class Remate extends Database
{
  /**
   * @var int $idRemate Identificador único del remate.
   */
  private $idRemate;

  /**
   * @var int $idEmpleadoRemate Identificador del empleado asociado al remate.
   */
  private $idEmpleadoRemate;

  /**
   * @var string|null $estadoRemate Estado actual del remate (puede ser null si no se especifica).
   */

  /**
   * Inserta un nuevo registro de remate en la base de datos.
   *
   * @param int $idEmpleadoRemate Identificador del empleado asociado al remate.
   * @param string|null $estadoRemate Estado actual del remate (opcional).
   */
  public function insert($idEmpleadoRemate, $estadoRemate = null)
  {
    if ($estadoRemate !== null) {
      $this->query("INSERT INTO remates (empleado, estado) VALUES (:idEmpleadoRemate, :estadoRemate)", [
        'idEmpleadoRemate' => $idEmpleadoRemate,
        'estadoRemate' => $estadoRemate
      ]);
    } else {
      $this->query("INSERT INTO remates (idEmpleado_remate) VALUES (:idEmpleadoRemate)", [
        'idEmpleadoRemate' => $idEmpleadoRemate
      ]);
    }
  }

  /**
   * Elimina un registro de remate de la base de datos.
   *
   * @param int $idRemate Identificador único del remate a eliminar.
   */
  public function delete($idRemate)
  {
    $this->query("DELETE FROM remates WHERE idRemate = :idRemate", [
      'idRemate' => $idRemate
    ]);
  }

  /**
   * Actualiza el estado de un remate en la base de datos.
   *
   * @param int $idRemate Identificador único del remate a actualizar.
   * @param string $estadoRemate Nuevo estado del remate.
   */
  public function update($idRemate, $estadoRemate)
  {
    $this->query("UPDATE remates SET estadoRemate = '$estadoRemate' WHERE idRemate = :idRemate", [
      'idRemate' => $idRemate
    ]);
  }

  /**
   * Obtiene un registro de remate por su identificador único.
   *
   * @param int $idRemate Identificador único del remate.
   * @return array|null El registro de remate encontrado o null si no se encuentra.
   */
  public function getById($idRemate)
  {
    return $this->query("SELECT * FROM remates WHERE idRemate = :idRemate", [
      'idRemate' => $idRemate
    ])->find();
  }

  /**
   * Obtiene todos los registros de remates de la base de datos.
   *
   * @return array Conjunto de registros de remates.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM remates")->get();
  }
}
?>
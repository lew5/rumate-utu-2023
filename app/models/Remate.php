<?php
/**
 * La clase Remate se encarga de gestionar los remates y sus estados en la base de datos.
 */
class Remate extends Database
{
  /**
   * @var int $id ID del remate.
   * @var int $empleado ID del empleado encargado del remate.
   * @var string|null $estado Estado del remate.
   */

  private $id;
  private $empleado;
  private $estado;

  /**
   * Inserta un nuevo registro de remate en la base de datos.
   *
   * @param int $idEmpleado ID del empleado encargado del remate.
   * @param string|null $estado Estado del remate (opcional).
   * @return void
   */
  public function insert($idEmpleado, $estado = null)
  {
    if ($estado != null) {
      $this->query("INSERT INTO remate (empleado, estado) VALUES (:id_empleado, :estado)", [
        'id_empleado' => $idEmpleado,
        'estado' => $estado
      ]);
    } else {
      $this->query("INSERT INTO remate (empleado) VALUES (:id_empleado)", [
        'id_empleado' => $idEmpleado
      ]);
    }
  }

  /**
   * Elimina un registro de remate de la base de datos.
   *
   * @param int $idRemate ID del remate a eliminar.
   * @return void
   */
  public function delete($idRemate)
  {
    $this->query("DELETE FROM remate WHERE id = :idRemate", [
      'idRemate' => $idRemate
    ]);
  }

  /**
   * Actualiza el estado de un registro de remate en la base de datos.
   *
   * @param int $idRemate ID del remate a actualizar.
   * @param string $estado Nuevo estado del remate.
   * @return void
   */
  public function update($idRemate, $estado)
  {
    $this->query("UPDATE remate SET estado = '$estado' WHERE id = :idRemate", [
      'idRemate' => $idRemate
    ]);
  }

  /**
   * Obtiene un registro de remate por su ID.
   *
   * @param int $idRemate ID del remate a buscar.
   * @return array|null Registro del remate encontrado o null si no se encuentra.
   */
  public function getById($idRemate)
  {
    return $this->query("SELECT * FROM remate WHERE id = :idRemate", [
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
    return $this->query("SELECT * FROM remate")->get();
  }
}
?>
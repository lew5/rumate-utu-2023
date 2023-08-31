<?php
/**
 * La clase Remate se encarga de gestionar los remates y sus estados en la base de datos.
 */
class Remate extends Database
{
  private $idRemate;
  private $idEmpleadoRemate;
  private $estadoRemate;

  public function insert($idEmpleadoRemate, $estadoRemate = null)
  {
    if ($estadoRemate != null) {
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

  public function delete($idRemate)
  {
    $this->query("DELETE FROM remates WHERE idRemate = :idRemate", [
      'idRemate' => $idRemate
    ]);
  }

  public function update($idRemate, $estadoRemate)
  {
    $this->query("UPDATE remates SET estadoRemate = '$estadoRemate' WHERE idRemate = :idRemate", [
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
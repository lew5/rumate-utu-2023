<?php
/**
 * La clase Persona se encarga de gestionar la información de personas en la base de datos.
 */
class Persona extends Database
{
  /**
   * @var int $idPersona Identificador único de la persona.
   */
  private $idPersona;

  /**
   * @var string $nombre Nombre de la persona.
   */
  private $nombre;

  /**
   * @var string $apellido Apellido de la persona.
   */
  private $apellido;

  /**
   * @var string $ci Número de cédula de identidad de la persona.
   */
  private $ci;

  /**
   * @var string $barrio Barrio de residencia de la persona.
   */
  private $barrio;

  /**
   * @var string $calle Calle de residencia de la persona.
   */
  private $calle;

  /**
   * @var string $numero Número de residencia de la persona.
   */
  private $numero;

  /**
   * @var string $telefono Número de teléfono de la persona.
   */
  private $telefono;

  /**
   * Inserta un nuevo registro de persona en la base de datos.
   */
  public function insert()
  {
    $this->query("INSERT INTO personas (nombre, apellido, ci, barrio, calle, numero, telefono) VALUES (:nombre, :apellido, :ci, :barrio, :calle, :numero, :telefono)", [
      'nombre' => $this->nombre,
      'apellido' => $this->apellido,
      'ci' => $this->ci,
      'barrio' => $this->barrio,
      'calle' => $this->calle,
      'numero' => $this->numero,
      'telefono' => $this->telefono,
    ]);
  }

  /**
   * Elimina un registro de persona de la base de datos.
   *
   * @param int $idPersona Identificador único de la persona a eliminar.
   */
  public function delete($idPersona)
  {
    $this->query("DELETE FROM personas WHERE idPersona = :idPersona", [
      'idPersona' => $idPersona
    ]);
  }

  /**
   * Actualiza la información de una persona en la base de datos.
   *
   * @param int $idPersona Identificador único de la persona a actualizar.
   * @param array $personaActualizada Array con los nuevos datos de la persona.
   */
  public function update($idPersona, $personaActualizada)
  {
    $this->query("UPDATE personas SET nombre = :nombre, apellido = :apellido, ci = :ci, barrio = :barrio, calle = :calle, numero = :numero, telefono = :telefono WHERE idPersona = :idPersona", [
      'nombre' => $personaActualizada['nombre'],
      'apellido' => $personaActualizada['apellido'],
      'ci' => $personaActualizada['ci'],
      'barrio' => $personaActualizada['barrio'],
      'calle' => $personaActualizada['calle'],
      'numero' => $personaActualizada['numero'],
      'telefono' => $personaActualizada['telefono'],
      'idPersona' => $idPersona
    ]);
  }

  /**
   * Obtiene un registro de persona por su identificador único.
   *
   * @param int $idPersona Identificador único de la persona.
   * @return array|null El registro de persona encontrado o null si no se encuentra.
   */
  public function getById($idPersona)
  {
    return $this->query("SELECT * FROM personas WHERE idPersona = :idPersona", [
      'idPersona' => $idPersona
    ])->find();
  }

  /**
   * Obtiene todos los registros de personas de la base de datos.
   *
   * @return array Conjunto de registros de personas.
   */
  public function getAll()
  {
    return $this->query("SELECT * FROM personas")->get();
  }


  public function getIdPersona()
  {
    return $this->idPersona;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function setCi($ci)
  {
    $this->ci = $ci;
  }

  public function getCi()
  {
    return $this->ci;
  }

  public function setBarrio($barrio)
  {
    $this->barrio = $barrio;
  }

  public function getBarrio()
  {
    return $this->barrio;
  }

  public function setCalle($calle)
  {
    $this->calle = $calle;
  }

  public function getCalle()
  {
    return $this->calle;
  }

  public function setNumero($numero)
  {
    $this->numero = $numero;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }

}

?>
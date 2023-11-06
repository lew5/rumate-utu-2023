<?php
/**
 * Clase Persona
 *
 * La clase `Persona` representa una entidad en la aplicación que almacena información sobre una persona. Se utiliza para gestionar detalles como el identificador, nombre, apellido, cédula de identidad, barrio, calle, número, teléfono, estado y usuario relacionados con una persona.
 */
class Persona
{
  /**
   * @var int El atributo `$id_persona` almacena el identificador único de la persona.
   */
  private $id_persona;

  /**
   * @var string El atributo `$nombre_persona` guarda el nombre de la persona.
   */
  private $nombre_persona;

  /**
   * @var string El atributo `$apellido_persona` almacena el apellido de la persona.
   */
  private $apellido_persona;

  /**
   * @var string El atributo `$ci_persona` guarda la cédula de identidad de la persona.
   */
  private $ci_persona;

  /**
   * @var string El atributo `$barrio_persona` almacena el barrio de la persona.
   */
  private $barrio_persona;

  /**
   * @var string El atributo `$calle_persona` guarda la calle de la persona.
   */
  private $calle_persona;

  /**
   * @var string El atributo `$numero_persona` almacena el número de la persona.
   */
  private $numero_persona;

  /**
   * @var string El atributo `$telefono_persona` guarda el número de teléfono de la persona.
   */
  private $telefono_persona;

  /**
   * @var string El atributo `$estado_persona` representa el estado de la persona.
   */
  private $estado_persona;

  /**
   * @var mixed El atributo `$usuario` almacena información relacionada con el usuario asociado a la persona.
   */
  private $usuario;

  public function getId()
  {
    return $this->id_persona;
  }

  public function setId($id)
  {
    $this->id_persona = $id;
  }

  public function getNombre()
  {
    return $this->nombre_persona;
  }

  public function setNombre($nombre)
  {
    $this->nombre_persona = $nombre;
  }

  public function getApellido()
  {
    return $this->apellido_persona;
  }

  public function setApellido($apellido)
  {
    $this->apellido_persona = $apellido;
  }

  public function getCi()
  {
    return $this->ci_persona;
  }

  public function setCi($ci)
  {
    $this->ci_persona = $ci;
  }

  public function getBarrio()
  {
    return $this->barrio_persona;
  }

  public function setBarrio($barrio)
  {
    $this->barrio_persona = $barrio;
  }

  public function getCalle()
  {
    return $this->calle_persona;
  }

  public function setCalle($calle)
  {
    $this->calle_persona = $calle;
  }

  public function getNumero()
  {
    return $this->numero_persona;
  }

  public function setNumero($numero)
  {
    $this->numero_persona = $numero;
  }

  public function getTelefono()
  {
    return $this->telefono_persona;
  }

  public function setTelefono($telefono)
  {
    $this->telefono_persona = $telefono;
  }

  public function getEstado()
  {
    return $this->estado_persona;
  }

  public function setEstado($estado)
  {
    $this->estado_persona = $estado;
  }

  public function getUsuario()
  {
    return $this->usuario;
  }

  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
  }
}


?>
<?php

class Persona
{
  private $id_persona;
  private $nombre_persona;
  private $apellido_persona;
  private $ci_persona;
  private $barrio_persona;
  private $calle_persona;
  private $numero_persona;
  private $telefono_persona;
  private $estado_persona;

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
}


?>
<?php

class Persona
{
  protected $id;
  protected $nombre;
  protected $apellido;
  protected $ci;
  protected $barrio;
  protected $calle;
  protected $numero;
  protected $telefono;

  protected $tipo;

  public function __construct(
    $id,
    $nombre,
    $apellido,
    $ci,
    $barrio,
    $calle,
    $numero,
    $telefono,
    $tipo
  ) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->ci = $ci;
    $this->barrio = $barrio;
    $this->calle = $calle;
    $this->numero = $numero;
    $this->telefono = $telefono;
    $this->tipo = $tipo;
  }

  //* SETTERS Y GETTERS
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }

  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  public function getBarrio()
  {
    return $this->barrio;
  }

  public function setBarrio($barrio)
  {
    $this->barrio = $barrio;
  }

  public function getCalle()
  {
    return $this->calle;
  }

  public function setCalle($calle)
  {
    $this->calle = $calle;
  }

  public function getNumero()
  {
    return $this->numero;
  }

  public function setNumero($numero)
  {
    $this->numero = $numero;
  }

  public function getTipo()
  {
    return $this->tipo;
  }

  public function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }

  public function getCi()
  {
    return $this->ci;
  }

  public function setCi($ci)
  {
    $this->ci = $ci;
  }

}

?>
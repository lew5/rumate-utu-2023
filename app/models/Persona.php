<?php

class Persona
{


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
}

?>
<?php

class Persona
{
  protected int $id;
  protected string $nombre;
  protected string $apellido;
  protected string $ci;
  protected string $barrio;
  protected string $calle;
  protected string $numero;
  protected string $telefono;

  protected string $tipo;

  public function __construct(
    int $id,
    string $nombre,
    string $apellido,
    string $ci,
    string $barrio,
    string $calle,
    string $numero,
    string $telefono,
    string $tipo
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
  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getNombre(): string
  {
    return $this->nombre;
  }

  public function setNombre(string $nombre): void
  {
    $this->nombre = $nombre;
  }

  public function getApellido(): string
  {
    return $this->apellido;
  }

  public function setApellido(string $apellido): void
  {
    $this->apellido = $apellido;
  }

  public function getTelefono(): string
  {
    return $this->telefono;
  }

  public function setTelefono(string $telefono): void
  {
    $this->telefono = $telefono;
  }

  public function getBarrio(): string
  {
    return $this->barrio;
  }

  public function setBarrio(string $barrio): void
  {
    $this->barrio = $barrio;
  }

  public function getCalle(): string
  {
    return $this->calle;
  }

  public function setCalle(string $calle): void
  {
    $this->calle = $calle;
  }

  public function getNumero(): string
  {
    return $this->numero;
  }

  public function setNumero(string $numero): void
  {
    $this->numero = $numero;
  }

  public function getTipo(): string
  {
    return $this->tipo;
  }

  public function setTipo(string $tipo): void
  {
    $this->tipo = $tipo;
  }

  public function getCi(): string
  {
    return $this->ci;
  }

  public function setCi(string $ci): void
  {
    $this->ci = $ci;
  }

}

?>
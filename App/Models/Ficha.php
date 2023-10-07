<?php

class Ficha
{

  private int $id;
  private int $peso;
  private int $cantidad;
  private string $raza;
  private string $descripcion;


  public function llenarFicha($ficha_data)
  {
    $this->id = $ficha_data['id_ficha'];
    $this->peso = $ficha_data['peso_ficha'];
    $this->cantidad = $ficha_data['cantidad_ficha'];
    $this->raza = $ficha_data['raza_ficha'];
    $this->descripcion = $ficha_data['descripcion_ficha'];
    return $this;
  }

  #region //* SETTERS Y GETTERS
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setPeso(int $peso): void
  {
    $this->peso = $peso;
  }

  public function getPeso(): int
  {
    return $this->peso;
  }

  public function setCantidad(int $cantidad): void
  {
    $this->cantidad = $cantidad;
  }

  public function getCantidad(): int
  {
    return $this->cantidad;
  }

  public function setRaza(string $raza): void
  {
    $this->raza = $raza;
  }

  public function getRaza(): string
  {
    return $this->raza;
  }

  public function setDescripcion(string $descripcion): void
  {
    $this->descripcion = $descripcion;
  }

  public function getDescripcion(): string
  {
    return $this->descripcion;
  }
  #endregion
}

?>
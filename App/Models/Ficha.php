<?php

class Ficha
{

  private $id;
  private $peso;
  private $cantidad;
  private $raza;
  private $descripcion;


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
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setPeso($peso)
  {
    $this->peso = $peso;
  }

  public function getPeso()
  {
    return $this->peso;
  }

  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;
  }

  public function getCantidad()
  {
    return $this->cantidad;
  }

  public function setRaza($raza)
  {
    $this->raza = $raza;
  }

  public function getRaza()
  {
    return $this->raza;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  public function getDescripcion()
  {
    return $this->descripcion;
  }
  #endregion
}

?>
<?php
class Ficha
{
  private $id_ficha;
  private $peso_ficha;
  private $cantidad_ficha;
  private $raza_ficha;
  private $descripcion_ficha;

  public function getId()
  {
    return $this->id_ficha;
  }

  public function setId($id)
  {
    $this->id_ficha = $id;
  }

  public function getPeso()
  {
    return $this->peso_ficha;
  }

  public function setPeso($peso)
  {
    $this->peso_ficha = $peso;
  }

  public function getCantidad()
  {
    return $this->cantidad_ficha;
  }

  public function setCantidad($cantidad)
  {
    $this->cantidad_ficha = $cantidad;
  }

  public function getRaza()
  {
    return $this->raza_ficha;
  }

  public function setRaza($raza)
  {
    $this->raza_ficha = $raza;
  }

  public function getDescripcion()
  {
    return $this->descripcion_ficha;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion_ficha = $descripcion;
  }
}



?>
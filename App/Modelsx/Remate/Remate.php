<?php

class Remate
{
  private $id;
  private $fechaInicio;
  private $fechaFinal;
  private $imagen;
  private $titulo;
  private $estado;
  private $lotes = [];

  public function __construct()
  {
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

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

  public function getLotes()
  {
    return $this->lotes;
  }

  public function setLotes($lotes)
  {
    $this->lotes = $lotes;
  }

  public function setFechaInicio($fecha)
  {
    $this->fechaInicio = $fecha;
  }

  public function getFechaInicio()
  {
    return $this->fechaInicio;
  }

  public function setFechaFinal($fecha)
  {
    $this->fechaFinal = $fecha;
  }

  public function getFechaFinal()
  {
    return $this->fechaFinal;
  }

  public function setImagen($img)
  {
    $this->imagen = $img;
  }

  public function getImagen()
  {
    return $this->imagen;
  }

  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }
}
?>
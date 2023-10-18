<?php
class Remate
{
  private $id_remate;
  private $titulo_remate;
  private $imagen_remate;
  private $fecha_inicio_remate;
  private $fecha_final_remate;
  private $estado_remate;
  private $lotes = [];

  public function getId()
  {
    return $this->id_remate;
  }

  public function setId($id)
  {
    $this->id_remate = $id;
  }

  public function getTitulo()
  {
    return $this->titulo_remate;
  }

  public function setTitulo($titulo)
  {
    $this->titulo_remate = $titulo;
  }

  public function getImagen()
  {
    return $this->imagen_remate;
  }

  public function setImagen($imagen)
  {
    $this->imagen_remate = $imagen;
  }

  public function getFechaInicio()
  {
    return $this->fecha_inicio_remate;
  }

  public function setFechaInicio($fechaInicio)
  {
    $this->fecha_inicio_remate = $fechaInicio;
  }

  public function getFechaFinal()
  {
    return $this->fecha_final_remate;
  }

  public function setFechaFinal($fechaFinal)
  {
    $this->fecha_final_remate = $fechaFinal;
  }

  public function getEstado()
  {
    return $this->estado_remate;
  }

  public function setEstado($estado)
  {
    $this->estado_remate = $estado;
  }

  public function getLotes()
  {
    return $this->lotes;
  }

  public function setLotes($lote)
  {
    $this->lotes = $lote;
  }
}

?>
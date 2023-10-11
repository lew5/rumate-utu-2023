<?php

class Remate
{
  private $id;
  private $estado;
  private $fecha;
  private $hora;
  private $img;
  private $titulo;
  private $lotes = [];


  public function llenarRemate($remate_data)
  {
    $this->id = $remate_data['id_remate'];
    $this->img = $remate_data['img_remate'];
    $this->titulo = $remate_data['titulo_remate'];
    $this->fecha = $remate_data['fecha_remate'];
    $this->hora = $remate_data['hora_remate'];
    $this->estado = $remate_data['estado_remate'];
    return $this;
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


  public function setPujas($pujas)
  {
    $this->pujas = $pujas;
  }

  public function getLotes()
  {
    return $this->lotes;
  }

  public function setLotes($lotes)
  {
    $this->lotes = $lotes;
  }

  public function setFecha($fecha)
  {
    $this->fecha = $fecha;
  }

  public function getFecha()
  {
    return $this->fecha;
  }

  public function setHora($hora)
  {
    $this->hora = $hora;
  }

  public function getHora()
  {
    return $this->hora;
  }

  public function setImg($img)
  {
    $this->img = $img;
  }

  public function getImg()
  {
    return $this->img;
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

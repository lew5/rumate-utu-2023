<?php

class Remate
{
  private int $id;
  private string $estado;
  private string $fecha;
  private string $hora;
  private string $img;
  private string $titulo;
  private array $lotes = [];


  public function llenarRemate($remate_data): Remate
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
  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function getEstado(): string
  {
    return $this->estado;
  }

  public function setEstado(string $estado)
  {
    $this->estado = $estado;
  }


  public function setPujas(array $pujas)
  {
    $this->pujas = $pujas;
  }

  public function getLotes(): array
  {
    return $this->lotes;
  }

  public function setLotes(array $lotes)
  {
    $this->lotes = $lotes;
  }

  public function setFecha(string $fecha): void
  {
    $this->fecha = $fecha;
  }

  public function getFecha(): string
  {
    return $this->fecha;
  }

  public function setHora(string $hora): void
  {
    $this->hora = $hora;
  }

  public function getHora(): string
  {
    return $this->hora;
  }

  public function setImg(string $img): void
  {
    $this->img = $img;
  }

  public function getImg(): string
  {
    return $this->img;
  }

  public function setTitulo(string $titulo): void
  {
    $this->titulo = $titulo;
  }

  public function getTitulo(): string
  {
    return $this->titulo;
  }
}


?>
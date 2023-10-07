<?php
class Lote
{
  private int $id;
  private float $precio_base;
  private float $precio_final;
  private string $categoria;
  private Ficha $ficha;
  private $id_remate;
  private array $pujas = [];


  public function llenarLote($lote_data, Ficha $ficha): Lote
  {
    $this->id = $lote_data['id_lote'];
    $this->id_remate = $lote_data['id_remate'];
    $this->precio_base = $lote_data['precio_base_lote'];
    $this->categoria = $lote_data['nombre_categoria'];
    $this->ficha = $ficha;
    return $this;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setPrecioBase(float $precio_base): void
  {
    $this->precio_base = $precio_base;
  }

  public function getPrecioBase(): float
  {
    return $this->precio_base;
  }

  public function setPrecioFinal(float $precio_final): void
  {
    $this->precio_final = $precio_final;
  }

  public function getPrecioFinal(): float
  {
    return $this->precio_final;
  }

  public function setCategoria(string $categoria): void
  {
    $this->categoria = $categoria;
  }

  public function getCategoria(): string
  {
    return $this->categoria;
  }

  public function setFicha(Ficha $ficha): void
  {
    $this->ficha = $ficha;
  }

  public function getFicha(): Ficha
  {
    return $this->ficha;
  }

  public function setIdRemate($id_remate): void
  {
    $this->id_remate = $id_remate;
  }

  public function getIdRemate()
  {
    return $this->id_remate;
  }

  public function setPujas(array $pujas): void
  {
    $this->pujas = $pujas;
  }

  public function getPujas(): array
  {
    return $this->pujas;
  }
}

?>
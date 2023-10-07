<?php
class Lote
{
  private $id;
  private $precio_base;
  private $precio_final;
  private $categoria;
  private $ficha;
  private $id_remate;
  private $pujas = [];


  public function llenarLote($lote_data, Ficha $ficha): Lote
  {
    $this->id = $lote_data['id_lote'];
    $this->id_remate = $lote_data['id_remate'];
    $this->precio_base = $lote_data['precio_base_lote'];
    $this->categoria = $lote_data['nombre_categoria'];
    $this->ficha = $ficha;
    return $this;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setPrecioBase($precio_base)
  {
    $this->precio_base = $precio_base;
  }

  public function getPrecioBase()
  {
    return $this->precio_base;
  }

  public function setPrecioFinal($precio_final)
  {
    $this->precio_final = $precio_final;
  }

  public function getPrecioFinal()
  {
    return $this->precio_final;
  }

  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;
  }

  public function getCategoria(): string
  {
    return $this->categoria;
  }

  public function setFicha($ficha)
  {
    $this->ficha = $ficha;
  }

  public function getFicha()
  {
    return $this->ficha;
  }

  public function setIdRemate($id_remate)
  {
    $this->id_remate = $id_remate;
  }

  public function getIdRemate()
  {
    return $this->id_remate;
  }

  public function setPujas($pujas)
  {
    $this->pujas = $pujas;
  }

  public function getPujas()
  {
    return $this->pujas;
  }
}

?>
<?php

class Lote
{
  private $id_lote;
  private $imagen_lote;
  private $precio_base_lote;
  private $mejor_oferta_lote = 0;
  private $id_proveedor_lote;
  private $id_ficha_lote;
  private $id_categoria_lote;
  private $ficha;
  private $categoria;

  public function getId()
  {
    return $this->id_lote;
  }

  public function setId($id)
  {
    $this->id_lote = $id;
  }

  public function getImagen()
  {
    return $this->imagen_lote;
  }

  public function setImagen($imagen)
  {
    $this->imagen_lote = $imagen;
  }

  public function getPrecioBase()
  {
    return $this->precio_base_lote;
  }

  public function setPrecioBase($precioBase)
  {
    $this->precio_base_lote = $precioBase;
  }

  public function getMejorOferta()
  {
    return $this->mejor_oferta_lote;
  }

  public function setMejorOferta($mejorOferta)
  {
    $this->mejor_oferta_lote = $mejorOferta;
  }

  public function getIdProveedor()
  {
    return $this->id_proveedor_lote;
  }

  public function setIdProveedor($idProveedor)
  {
    $this->id_proveedor_lote = $idProveedor;
  }

  public function getIdFicha()
  {
    return $this->id_ficha_lote;
  }

  public function setIdFicha($idFicha)
  {
    $this->id_ficha_lote = $idFicha;
  }

  public function getIdCategoria()
  {
    return $this->id_categoria_lote;
  }

  public function setIdCategoria($idCategoria)
  {
    $this->id_categoria_lote = $idCategoria;
  }

  public function getFicha()
  {
    return $this->ficha;
  }

  public function setFicha($ficha)
  {
    $this->ficha = $ficha;
  }

  public function getCategoria()
  {
    return $this->categoria;
  }

  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;
  }
}

?>
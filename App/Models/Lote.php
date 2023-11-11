<?php

/**
 * Clase Lote
 *
 * La clase `Lote` representa una entidad en la aplicación que almacena información sobre lotes. Se utiliza para gestionar detalles como el identificador, imagen, precio base, mejor oferta, proveedor, ficha, categoría y remate relacionados con un lote.
 */
class Lote
{
  /**
   * @var int El atributo `$id_lote` almacena el identificador único del lote.
   */
  private $id_lote;

  /**
   * @var string El atributo `$imagen_lote` guarda la imagen asociada al lote.
   */
  private $imagen_lote;

  /**
   * @var float El atributo `$precio_base_lote` almacena el precio base del lote.
   */
  private $precio_base_lote;

  /**
   * @var float El atributo `$mejor_oferta_lote` guarda la mejor oferta del lote, inicializado en 0.
   */
  private $mejor_oferta_lote = 0;

  /**
   * @var int El atributo `$id_proveedor_lote` almacena el identificador del proveedor del lote.
   */
  private $id_proveedor_lote;

  /**
   * @var int El atributo `$id_ficha_lote` almacena el identificador de la ficha relacionada con el lote.
   */
  private $id_ficha_lote;

  /**
   * @var int El atributo `$id_categoria_lote` almacena el identificador de la categoría a la que pertenece el lote.
   */
  private $id_categoria_lote;

  /**
   * @var mixed El atributo `$ficha` almacena información sobre la ficha relacionada con el lote.
   */
  private $ficha;

  /**
   * @var mixed El atributo `$categoria` almacena información sobre la categoría a la que pertenece el lote.
   */
  private $categoria;

  /**
   * @var mixed El atributo `$proveedor` almacena información sobre el proveedor del lote.
   */
  private $proveedor;

  /**
   * @var int El atributo `$id_remate` almacena el identificador del remate al que pertenece el lote.
   */
  private $id_remate;

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

  public function getProveedor()
  {
    return $this->proveedor;
  }

  public function setProveedor($proveedor)
  {
    $this->proveedor = $proveedor;
  }

  public function getIdRemate()
  {
    return $this->id_remate;
  }
  public function setIdRemate($id_remate)
  {
    $this->id_remate = $id_remate;
  }
}

?>
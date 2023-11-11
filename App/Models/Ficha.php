<?php
/**
 * Clase Ficha
 *
 * La clase `Ficha` representa una entidad en la aplicación que almacena información sobre fichas. Se utiliza para gestionar detalles como el identificador, peso, cantidad, raza y descripción de las fichas.
 */
class Ficha
{
  /**
   * @var int El atributo `$id_ficha` almacena el identificador único de la ficha.
   */
  private $id_ficha;

  /**
   * @var float El atributo `$peso_ficha` guarda el peso de la ficha.
   */
  private $peso_ficha;

  /**
   * @var int El atributo `$cantidad_ficha` almacena la cantidad de fichas.
   */
  private $cantidad_ficha;

  /**
   * @var string El atributo `$raza_ficha` guarda la raza de las fichas.
   */
  private $raza_ficha;

  /**
   * @var string El atributo `$descripcion_ficha` almacena una descripción de las fichas.
   */
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
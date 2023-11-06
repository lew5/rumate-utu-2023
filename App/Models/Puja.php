<?php
/**
 * Clase Puja
 *
 * La clase `Puja` representa una entidad en la aplicación que almacena información sobre pujas realizadas en un proceso de subasta. Se utiliza para gestionar detalles como el identificador único de la puja y el monto de la puja.
 */
class Puja
{
  /**
   * @var int El atributo `$id_puja` almacena el identificador único de la puja.
   */
  private $id_puja;

  /**
   * @var float El atributo `$monto_puja` guarda el monto de la puja realizada.
   */
  private $monto_puja;

  /**
   * Obtiene el identificador de la puja.
   * 
   * @return int
   */
  public function getId()
  {
    return $this->id_puja;
  }

  /**
   * Establece el identificador de la puja.
   * 
   * @param int $id
   */
  public function setId($id)
  {
    $this->id_puja = $id;
  }

  /**
   * Obtiene el monto de la puja.
   * 
   * @return float
   */
  public function getMonto()
  {
    return $this->monto_puja;
  }

  /**
   * Establece el monto de la puja.
   * 
   * @param float $monto
   */
  public function setMonto($monto)
  {
    $this->monto_puja = $monto;
  }
}
?>
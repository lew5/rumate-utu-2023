<?php
/**
 * Clase Proveedor
 *
 * La clase `Proveedor` es una extensión de la clase `Persona` y representa una entidad en la aplicación que almacena información sobre proveedores. Además de heredar los atributos y métodos de la clase `Persona`, se utiliza para gestionar una colección de lotes asociados a un proveedor.
 */
class Proveedor extends Persona
{
  /**
   * @var array El atributo `$lotes` almacena una colección de lotes asociados a un proveedor.
   */
  private $lotes = [];

  /**
   * Obtiene la colección de lotes asociados al proveedor.
   * 
   * @return array
   */
  public function getLotes()
  {
    return $this->lotes;
  }

  /**
   * Agrega un lote a la colección de lotes del proveedor.
   * 
   * @param mixed $lote
   */
  public function setLote($lote)
  {
    $this->lotes[] = $lote;
  }
}
?>
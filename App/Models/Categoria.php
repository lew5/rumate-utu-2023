<?php
/**
 * Clase Categoria
 *
 * Esta es una clase que representa una categoría en la aplicación. La clase `Categoria` es utilizada para gestionar información relacionada con categorías.
 */
class Categoria
{
  /**
   * @var int El atributo `$id_categoria` almacena el identificador único de la categoría.
   */
  private $id_categoria;

  /**
   * @var string El atributo `$nombre_categoria` guarda el nombre de la categoría.
   */
  private $nombre_categoria;

  public function getId()
  {
    return $this->id_categoria;
  }

  public function setId($id)
  {
    $this->id_categoria = $id;
  }

  public function getNombre()
  {
    return $this->nombre_categoria;
  }

  public function setNombre($nombre)
  {
    $this->nombre_categoria = $nombre;
  }
}


?>
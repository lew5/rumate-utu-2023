<?php

class Categoria
{
  private $id_categoria;
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
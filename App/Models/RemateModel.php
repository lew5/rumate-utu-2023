<?php

class RemateModel extends Model
{
  private $id;
  private $estado;
  private $fecha;
  private $hora;
  private $img;
  private $titulo;
  private $lotes = [];
  private $tabla = "remates";
  
  public function __construct()
  {
    parent::__construct();
  }

  #region //FUNCIONA
  public function getRemates()
  {
    return $this->all($this->tabla);
  }

  public function getRemate($id)
  {
    return $this->find($this->tabla,$id, "id_remate");
  }
#endregion
  // public function obtenerRemate($id)
  // {
  //   return $this->find($id, "id_remate");
  // }

  // public function crearRemate($data) //✅
  // {
  //   try {
  //     return $this->create($data);
  //   } catch (PDOException $e) {
  //     if ($e->getCode() == 1062) {
  //       return false;
  //     } else {
  //       return false;
  //     }
  //   }
  // }
  // public function actualizarRemate($id, $data) //✅
  // {
  //   return $this->update($id, "id_remate", $data); //✅
  // }
  // public function borrarRemate($id) //✅
  // {
  //   return $this->delete($id, "id_remate");
  // }

  // //* SETTERS Y GETTERS
  // public function getId()
  // {
  //   return $this->id;
  // }

  // public function setId($id)
  // {
  //   $this->id = $id;
  // }

  // public function getEstado()
  // {
  //   return $this->estado;
  // }

  // public function setEstado($estado)
  // {
  //   $this->estado = $estado;
  // }

  // public function getLotes()
  // {
  //   return $this->lotes;
  // }

  // public function setLotes($lotes)
  // {
  //   $this->lotes = $lotes;
  // }

  // public function setFecha($fecha)
  // {
  //   $this->fecha = $fecha;
  // }

  // public function getFecha()
  // {
  //   return $this->fecha;
  // }

  // public function setHora($hora)
  // {
  //   $this->hora = $hora;
  // }

  // public function getHora()
  // {
  //   return $this->hora;
  // }

  // public function setImg($img)
  // {
  //   $this->img = $img;
  // }

  // public function getImg()
  // {
  //   return $this->img;
  // }

  // public function setTitulo($titulo)
  // {
  //   $this->titulo = $titulo;
  // }

  // public function getTitulo()
  // {
  //   return $this->titulo;
  // }
}
?>

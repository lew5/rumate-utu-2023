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
    return $this->find($this->tabla, $id, "id_remate");
  }

  public function getLotes($idRemate)
  {
    $sql = "SELECT LP.id_remate_lote_postula_remate AS 
              id_remate, L.id_lote, L.precio_base_lote, C.nombre_categoria AS 
              nombre_categoria,F.id_ficha, F.peso_ficha, F.cantidad_ficha, F.raza_ficha, F.descripcion_ficha
              FROM LOTES_POSTULAN_REMATES LP
              INNER JOIN LOTES L ON LP.id_lote_lote_postula_remate = L.id_lote
              INNER JOIN LOTES_CATEGORIZADOS LC ON L.id_lote = LC.id_lote_lote_categorizado
              INNER JOIN CATEGORIAS C ON LC.id_categoria_lote_categorizado = C.id_categoria
              INNER JOIN LOTES_DESCRITOS_POR_FICHAS LF ON L.id_lote = LF.id_lote_lote_descrito_por_ficha
              INNER JOIN FICHAS F ON LF.id_ficha_lote_descrito_por_ficha = F.id_ficha
              WHERE LP.id_remate_lote_postula_remate = ?;";
    return $this->sql($sql, true, $idRemate);
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
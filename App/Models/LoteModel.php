<?php

class LoteModel extends Model
{
  private $id;
  private $precio_base;
  private $precio_final;
  private $categoria;
  private $ficha;
  private $id_remate;
  private $pujas = [];
  private $tabla = "lotes";

  // public function crearLote($lote)
  // {
  //   $data = [
  //     'precio_base_lote' => $lote->getPrecioBase(),
  //     'precio_final_lote' => $lote->getPrecioFinal()
  //   ];
  //   return $this->create($data);
  // }

  // public function actualizarLote($id, $precio_base) //✅
  // {
  //   $data = [
  //     'precio_base_lote' => $precio_base,
  //   ];

  //   return $this->update($id, "id_lote", $data);
  // }

  // public function borrarLote($id) //✅ si no hay dependencia fk
  // {
  //   return $this->delete($id, "id_lote");
  // }

  #region //* FUNCIONA 🟢

  public function getLote($idRemate, $idLote)
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
              WHERE LP.id_remate_lote_postula_remate = ? AND L.id_lote = ?;";
    return $this->sql($sql, false, $idRemate, $idLote);
  }
  #endregion


  #region //* SETTERS Y GETTERS
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
  #endregion
}


?>
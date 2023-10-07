<?php

class LoteModel extends Model
{
  protected $table = 'lotes';

  public function crearLote($lote)
  {
    $data = [
      'precio_base_lote' => $lote->getPrecioBase(),
      'precio_final_lote' => $lote->getPrecioFinal()
    ];
    return $this->create($data);
  }

  public function actualizarLote($id, $precio_base) //✅
  {
    $data = [
      'precio_base_lote' => $precio_base,
    ];

    return $this->update($id, "id_lote", $data);
  }

  public function borrarLote($id) //✅ si no hay dependencia fk
  {
    return $this->delete($id, "id_lote");
  }

  public function obtenerLote($id) //✅
  {
    $lte = $this->find($id, "id_lote");
    return $this->rellenarLote($lte);
  }

  public function obtenerTodosLosLotes() //✅
  {
    return $this->all();
  }

  public function obtenerTodosLosLotesDeRemate($idRemate)
  {
    $query = "SELECT LP.id_remate_lote_postula_remate AS 
              id_remate, L.id_lote, L.precio_base_lote, C.nombre_categoria AS 
              nombre_categoria,F.id_ficha, F.peso_ficha, F.cantidad_ficha, F.raza_ficha, F.descripcion_ficha
              FROM LOTES_POSTULAN_REMATES LP
              INNER JOIN LOTES L ON LP.id_lote_lote_postula_remate = L.id_lote
              INNER JOIN LOTES_CATEGORIZADOS LC ON L.id_lote = LC.id_lote_lote_categorizado
              INNER JOIN CATEGORIAS C ON LC.id_categoria_lote_categorizado = C.id_categoria
              INNER JOIN LOTES_DESCRITOS_POR_FICHAS LF ON L.id_lote = LF.id_lote_lote_descrito_por_ficha
              INNER JOIN FICHAS F ON LF.id_ficha_lote_descrito_por_ficha = F.id_ficha
              WHERE LP.id_remate_lote_postula_remate = ?;";
    return $this->db->query($query, [$idRemate])->fetchAll();
  }
  public function getLote($idRemate, $idLote)
  {
    $query = "SELECT LP.id_remate_lote_postula_remate AS 
              id_remate, L.id_lote, L.precio_base_lote, C.nombre_categoria AS 
              nombre_categoria,F.id_ficha, F.peso_ficha, F.cantidad_ficha, F.raza_ficha, F.descripcion_ficha
              FROM LOTES_POSTULAN_REMATES LP
              INNER JOIN LOTES L ON LP.id_lote_lote_postula_remate = L.id_lote
              INNER JOIN LOTES_CATEGORIZADOS LC ON L.id_lote = LC.id_lote_lote_categorizado
              INNER JOIN CATEGORIAS C ON LC.id_categoria_lote_categorizado = C.id_categoria
              INNER JOIN LOTES_DESCRITOS_POR_FICHAS LF ON L.id_lote = LF.id_lote_lote_descrito_por_ficha
              INNER JOIN FICHAS F ON LF.id_ficha_lote_descrito_por_ficha = F.id_ficha
              WHERE LP.id_remate_lote_postula_remate = ? AND L.id_lote = ?;";
    return $this->db->query($query, [$idRemate, $idLote])->fetch();
  }
  public function getPujaMasAlta($idRemate, $idLote)
  {
    $query = "SELECT MAX(pujas.monto_puja) AS puja_mas_alta
              FROM PUJAS
              INNER JOIN PUJAS_DE_REMATES ON PUJAS.id_puja = PUJAS_DE_REMATES.id_puja_puja_de_remate
              INNER JOIN LOTES ON PUJAS_DE_REMATES.id_lote_puja_de_remate = LOTES.id_lote
              WHERE LOTES.id_lote = ? AND PUJAS_DE_REMATES.id_remate_puja_de_remate = ?;";
    return $this->db->query($query, [$idRemate, $idLote])->fetch();
  }


  private function rellenarLote($lte)
  {
    if ($lte) {
      $lote = Container::resolve(
        Lote::class,
        $lte['precio_base_lote'],
        $lte['precio_final_lote']
      );
      return $lote;
    } else {
      return false;
    }
  }
}


?>
<?php

class ProveedorModel extends ClienteModel
{


  public function getLotesDeProveedor($username)
  {
    $query = "SELECT L.* 
              FROM CLIENTES C
              INNER JOIN LOTES L ON C.id_persona_cliente = L.id_cliente_lote
              WHERE C.id_persona_cliente = ?";
    $result = $this->db->query($query, [$username])->fetchAll();
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
}
?>
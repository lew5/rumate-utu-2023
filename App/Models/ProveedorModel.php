<?php

class ProveedorModel extends ClienteModel
{
  public function getLotes($idProveedor)
  {
    $sql = "SELECT L.* 
              FROM CLIENTES C
              INNER JOIN LOTES L ON C.id_persona_cliente = L.id_cliente_lote
              WHERE C.id_persona_cliente = ?";
    return $this->sql($sql, true, $idProveedor);
  }
}
?>

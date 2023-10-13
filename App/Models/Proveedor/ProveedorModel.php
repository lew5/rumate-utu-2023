<?php

class ProveedorModel extends ClienteModel
{
  private $lotes = [];

  #region //* FUNCIONA 🟢
  public function getLotes($idProveedor)
  {
    $sql = "SELECT L.* 
              FROM CLIENTES C
              INNER JOIN LOTES L ON C.id_persona_cliente = L.id_cliente_lote
              WHERE C.id_persona_cliente = ?";
    return $this->sql($sql, true, $idProveedor);
  }
  #endregion
  #region //* SETTERS Y GETTERS

  public function setLotes($lotes)
  {
    $this->lotes = $lotes;
  }
  #endregion
}
?>
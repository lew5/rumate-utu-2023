<?php

class Proveedor extends Cliente
{
  private $lotes = [];

  public function __construct($id, $nombre, $apellido, $ci, $barrio, $calle, $numero, $telefono, $tipo, $estado)
  {
    parent::__construct(
      $id,
      $nombre,
      $apellido,
      $ci,
      $barrio,
      $calle,
      $numero,
      $telefono,
      $tipo,
      $estado
    );
  }

  #region //* SETTERS Y GETTERS
  public function getLotes()
  {
    return $this->lotes;
  }

  public function setLotes($lotes)
  {
    $this->lotes = $lotes;
  }
  #endregion
}
?>
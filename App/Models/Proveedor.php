<?php

class Proveedor extends Cliente
{
  private array $lotes = [];

  public function __construct(int $id, string $nombre, string $apellido, string $ci, string $barrio, string $calle, string $numero, string $telefono, string $tipo, string $estado)
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
  public function getLotes(): array
  {
    return $this->lotes;
  }

  public function setLotes(array $lotes)
  {
    $this->lotes = $lotes;
  }
  #endregion
}
?>
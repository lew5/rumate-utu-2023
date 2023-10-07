<?php

class Cliente extends Persona
{
  private string $estado;
  private array $pujas = [];

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
      $tipo
    );
    $this->estado = $estado;
  }

  public function realizarPuja($monto, $lote, $remate)
  {
    $puja = new Puja($this, $lote, $remate, $monto);
    $this->pujas[] = $puja;
    //SQL INSERT
    $lote->agregarNuevaPuja($puja);
    $remate->agregarNuevaPuja($puja);
  }

  public function solicitarPermisoProveedor()
  {
    //SQL
  }


  #region //* SETTERS Y GETTERS
  public function getEstado(): string
  {
    return $this->estado;
  }

  public function setEstado(string $estado)
  {
    $this->estado = $estado;
  }

  public function getPujas(): array
  {
    return $this->pujas;
  }

  public function setPujas(array $pujas)
  {
    $this->pujas = $pujas;
  }
  #endregion
}
?>
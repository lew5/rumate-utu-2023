<?php

class Cliente extends Persona
{
  private $estado;
  private $pujas = [];

  public function __construct()
  {
  }

  #region //* SETTERS Y GETTERS
  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

  public function getPujas()
  {
    return $this->pujas;
  }

  public function setPujas($pujas)
  {
    $this->pujas = $pujas;
  }
  #endregion
}
?>
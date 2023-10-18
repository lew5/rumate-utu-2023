<?php

class Proveedor extends Persona
{
  private $lotes = [];
  public function __construct()
  {
    parent::__construct();
  }
  public function getLotes()
  {
    return $this->lotes;
  }

  public function setLote($lote)
  {
    $this->lotes[] = $lote;
  }
}

?>
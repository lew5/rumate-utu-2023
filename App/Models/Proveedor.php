<?php

class Proveedor extends Persona
{
  private $lotes = [];
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
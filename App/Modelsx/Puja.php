<?php

class Puja
{
  private $id;
  private $remate;
  private $lote;
  private $cliente;
  private $monto;
  private $fecha;

  public function __construct(
    $cliente,
    $remate,
    $lote,
    $monto
  ) {
    $this->cliente = $cliente;
    $this->remate = $remate;
    $this->lote = $lote;
    $this->monto = $monto;
  }


  public function setCliente($cliente)
  {
    $this->cliente = $cliente;
  }
  public function setRemate($remate)
  {
    $this->remate = $remate;
  }

  public function setLote($lote)
  {
    $this->lote = $lote;
  }

  public function getCliente()
  {
    return $this->cliente;
  }

  public function getRemate()
  {
    return $this->remate;
  }

  public function getLote()
  {
    return $this->lote;
  }
}

?>
<?php

class Puja
{
  private int $id;
  private Remate $remate;
  private Lote $lote;
  private Cliente $cliente;
  private float $monto;
  private string $fecha;

  public function __construct(
    Cliente $cliente,
    Remate $remate,
    Lote $lote,
    float $monto
  ) {
    $this->cliente = $cliente;
    $this->remate = $remate;
    $this->lote = $lote;
    $this->monto = $monto;
  }


  public function setCliente(Cliente $cliente): void
  {
    $this->cliente = $cliente;
  }
  public function setRemate($remate): void
  {
    $this->remate = $remate;
  }

  public function setLote($lote): void
  {
    $this->lote = $lote;
  }

  public function getCliente(): Cliente
  {
    return $this->cliente;
  }

  public function getRemate(): Remate
  {
    return $this->remate;
  }

  public function getLote(): Lote
  {
    return $this->lote;
  }
}

?>
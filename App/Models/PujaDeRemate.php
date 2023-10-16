<?php

class PujaDeRemate
{
  private $id_puja_puja_de_remate;
  private $id_remate_puja_de_remate;
  private $id_lote_puja_de_remate;

  public function getIdPuja()
  {
    return $this->id_puja_puja_de_remate;
  }

  public function setIdPuja($idPuja)
  {
    $this->id_puja_puja_de_remate = $idPuja;
  }

  public function getIdRemate()
  {
    return $this->id_remate_puja_de_remate;
  }

  public function setIdRemate($idRemate)
  {
    $this->id_remate_puja_de_remate = $idRemate;
  }

  public function getIdLote()
  {
    return $this->id_lote_puja_de_remate;
  }

  public function setIdLote($idLote)
  {
    $this->id_lote_puja_de_remate = $idLote;
  }
}


?>
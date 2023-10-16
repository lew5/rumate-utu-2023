<?php

class LotePostulaRemate
{
  private $id_remate_lote_postula_remate;
  private $id_lote_lote_postula_remate;

  public function getIdRemate()
  {
    return $this->id_remate_lote_postula_remate;
  }

  public function setIdRemate($idRemate)
  {
    $this->id_remate_lote_postula_remate = $idRemate;
  }

  public function getIdLote()
  {
    return $this->id_lote_lote_postula_remate;
  }

  public function setIdLote($idLote)
  {
    $this->id_lote_lote_postula_remate = $idLote;
  }
}


?>
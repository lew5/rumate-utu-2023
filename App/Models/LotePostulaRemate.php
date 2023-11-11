<?php

/**
 * Clase LotePostulaRemate
 *
 * La clase `LotePostulaRemate` representa una entidad en la aplicación que registra la relación entre un remate y un lote que se postula para participar en dicho remate.
 */
class LotePostulaRemate
{
  /**
   * @var int El atributo `$id_remate_lote_postula_remate` almacena el identificador único del remate al que un lote se postula.
   */
  private $id_remate_lote_postula_remate;

  /**
   * @var int El atributo `$id_lote_lote_postula_remate` guarda el identificador único del lote que se postula para participar en un remate.
   */
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
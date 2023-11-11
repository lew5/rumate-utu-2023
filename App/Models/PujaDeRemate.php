<?php
/**
 * Clase PujaDeRemate
 *
 * La clase `PujaDeRemate` representa una entidad en la aplicación que registra la relación entre una puja, un remate y un lote. Se utiliza para gestionar la asociación entre pujas, remates y lotes.
 */
class PujaDeRemate
{
  /**
   * @var int El atributo `$id_puja_puja_de_remate` almacena el identificador único de la puja relacionada con un remate y un lote.
   */
  private $id_puja_puja_de_remate;

  /**
   * @var int El atributo `$id_remate_puja_de_remate` guarda el identificador único del remate relacionado con la puja.
   */
  private $id_remate_puja_de_remate;

  /**
   * @var int El atributo `$id_lote_puja_de_remate` almacena el identificador único del lote relacionado con la puja.
   */
  private $id_lote_puja_de_remate;

  /**
   * Obtiene el identificador de la puja relacionada con un remate y un lote.
   * 
   * @return int
   */
  public function getIdPuja()
  {
    return $this->id_puja_puja_de_remate;
  }

  /**
   * Establece el identificador de la puja relacionada con un remate y un lote.
   * 
   * @param int $idPuja
   */
  public function setIdPuja($idPuja)
  {
    $this->id_puja_puja_de_remate = $idPuja;
  }

  /**
   * Obtiene el identificador del remate relacionado con la puja.
   * 
   * @return int
   */
  public function getIdRemate()
  {
    return $this->id_remate_puja_de_remate;
  }

  /**
   * Establece el identificador del remate relacionado con la puja.
   * 
   * @param int $idRemate
   */
  public function setIdRemate($idRemate)
  {
    $this->id_remate_puja_de_remate = $idRemate;
  }

  /**
   * Obtiene el identificador del lote relacionado con la puja.
   * 
   * @return int
   */
  public function getIdLote()
  {
    return $this->id_lote_puja_de_remate;
  }

  /**
   * Establece el identificador del lote relacionado con la puja.
   * 
   * @param int $idLote
   */
  public function setIdLote($idLote)
  {
    $this->id_lote_puja_de_remate = $idLote;
  }
}
?>
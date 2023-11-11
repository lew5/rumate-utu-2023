<?php
/**
 * Clase PujaDePersona
 *
 * La clase `PujaDePersona` representa una entidad en la aplicación que registra la relación entre una puja y una persona que participa en la subasta. Se utiliza para gestionar la asociación entre pujas y personas.
 */
class PujaDePersona
{
  /**
   * @var int El atributo `$id_puja_puja_de_persona` almacena el identificador único de la puja relacionada con una persona.
   */
  private $id_puja_puja_de_persona;

  /**
   * @var int El atributo `$id_persona_puja_de_persona` guarda el identificador único de la persona que participa en la subasta.
   */
  private $id_persona_puja_de_persona;

  /**
   * Obtiene el identificador de la puja relacionada con una persona.
   * 
   * @return int
   */
  public function getIdPuja()
  {
    return $this->id_puja_puja_de_persona;
  }

  /**
   * Establece el identificador de la puja relacionada con una persona.
   * 
   * @param int $idPuja
   */
  public function setIdPuja($idPuja)
  {
    $this->id_puja_puja_de_persona = $idPuja;
  }

  /**
   * Obtiene el identificador de la persona que participa en la subasta.
   * 
   * @return int
   */
  public function getIdPersona()
  {
    return $this->id_persona_puja_de_persona;
  }

  /**
   * Establece el identificador de la persona que participa en la subasta.
   * 
   * @param int $idPersona
   */
  public function setIdPersona($idPersona)
  {
    $this->id_persona_puja_de_persona = $idPersona;
  }
}
?>
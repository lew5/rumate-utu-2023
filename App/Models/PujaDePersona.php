<?php

class PujaDePersona
{
  private $id_puja_puja_de_persona;
  private $id_persona_puja_de_persona;

  public function getIdPuja()
  {
    return $this->id_puja_puja_de_persona;
  }

  public function setIdPuja($idPuja)
  {
    $this->id_puja_puja_de_persona = $idPuja;
  }

  public function getIdPersona()
  {
    return $this->id_persona_puja_de_persona;
  }

  public function setIdPersona($idPersona)
  {
    $this->id_persona_puja_de_persona = $idPersona;
  }
}


?>
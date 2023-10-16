<?php

class Puja
{
  private $id_puja;
  private $monto_puja;

  public function getId()
  {
    return $this->id_puja;
  }

  public function setId($id)
  {
    $this->id_puja = $id;
  }

  public function getMonto()
  {
    return $this->monto_puja;
  }

  public function setMonto($monto)
  {
    $this->monto_puja = $monto;
  }
}


?>
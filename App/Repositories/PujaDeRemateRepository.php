<?php

class PujaDeRemateRepository extends Repository
{
  public function __construct()
  {
    parent::__construct("pujas_de_remates","id_puja_puja_de_remate","PujaDeRemate");
  }

  public function find()
  {
    return $this->read();
  }

  public function findByPujaId($id)
  {
    return $this->read(
      [
        "$this->idColumn" => $id
      ]
    );
  }

  public function addPujaDeRemate($data)
  {
    $this->create($data);
  }

  public function updatePujaDeRemate($id, $data)
  {
    $this->update($id, $data);
  }

  public function deletePujaDeRemate($id)
  {
    $this->delete($id);
  }
}
?>

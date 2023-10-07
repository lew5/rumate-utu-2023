<?php

class RemateModel extends Model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = "remates";
  }

  public function obtenerTodosLosRemates()
  {
    return $this->all();
  }

  public function obtenerRemate($id) //✅
  {
    return $this->find($id, "id_remate");
  }

  public function crearRemate($data) //✅
  {
    try {
      return $this->create($data);
    } catch (PDOException $e) {
      if ($e->getCode() == 1062) {
        return false;
      } else {
        return false;
      }
    }
  }
  public function actualizarRemate($id, $data) //✅
  {
    return $this->update($id, "id_remate", $data); //✅
  }
  public function borrarRemate($id) //✅
  {
    return $this->delete($id, "id_remate");
  }
}
?>
<?php

class RemateModel extends Model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = "remates";
  }

  public function obtenerTodosLosRemates(): array
  {
    return $this->all();
  }

  public function obtenerRemate(int $id) //✅
  {
    return $this->find($id, "id_remate");
  }

  public function crearRemate(array $data): int|bool //✅
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
  public function actualizarRemate(int $id, array $data) //✅
  {
    return $this->update($id, "id_remate", $data); //✅
  }
  public function borrarRemate(int $id): bool //✅
  {
    return $this->delete($id, "id_remate");
  }
}
?>
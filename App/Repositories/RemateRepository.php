<?php

class RemateRepository extends BaseRepository implements IRepositoryInterface
{
  private $_db;
  private $table = "remates";
  private $obj = "Remate";
  public function find($id)
  {
    return $this->readOne($id, $this->table, "id_remate", $this->obj);
  }
  public function findAll()
  {
    return $this->readAll($this->table, $this->obj);
  }
  public function create($remateModel)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "INSERT INTO REMATES (
            titulo_remate,
            imagen_remate,
            fecha_inicio_remate,
            fecha_final_remate,
            estado_remate
        ) 
        VALUES (
            :titulo,
            :imagen,
            :fecha_inicio,
            :fecha_final,
            :estado
        )"
    );
    $stm->execute([
      'titulo' => $remateModel->getTitulo(),
      'imagen' => $remateModel->getImagen(),
      'fecha_inicio' => $remateModel->getFechaInicio(),
      'fecha_final' => $remateModel->getFechaFinal(),
      'estado' => $remateModel->getEstado()
    ]);
    $this->_db = null;
  }

  public function update($model)
  {
    // HAY QUE HACER UN UPDATE GENÉRICO
    // ALGO COMO ESTO 
    // protected function update($id, $column_id, $data)
    // {
    //   $columns = [];
    //   foreach ($data as $column => $value) {
    //     $columns[] = "$column = ?";
    //   }
    //   $columns = implode(', ', $columns);

    //   $query = "UPDATE {$this->table} SET {$columns} WHERE $column_id = ?";
    //   $data["$column_id"] = $id;

    //   $statement = $this->db->query($query, array_values($data));
    //   $rowCount = $statement->rowCount();
    //   if ($rowCount > 0) {
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }
  }
  public function delete($id)
  {
    return $this->deleteOne($id, $this->table, "id_remate");
  }
}

?>
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

  }
  public function delete($id)
  {
    return $this->deleteOne($id, $this->table, "id_remate");
  }
}

?>
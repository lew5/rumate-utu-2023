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
    $lastInsertId = null;
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
    $lastInsertId = $this->_db->lastInsertId();
    $this->_db = null;
    return $lastInsertId;
  }

  public function update($model)
  {

  }
  public function delete($id)
  {
    return $this->deleteOne($id, $this->table, "id_remate");
  }

  public function getLotes($idRemate)
  {
    $this->_db = DataBase::get();
    $result = [];
    try {
      $stm = $this->_db->prepare(
        "SELECT * 
        FROM LOTES 
        WHERE id_lote IN (SELECT id_lote_lote_postula_remate 
        FROM LOTES_POSTULAN_REMATES 
        WHERE id_remate_lote_postula_remate = :idRemate);"
      );
      $stm->execute([
        'idRemate' => $idRemate
      ]);

      $result = $stm->fetchAll(PDO::FETCH_CLASS, "Lote");
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }
}

?>
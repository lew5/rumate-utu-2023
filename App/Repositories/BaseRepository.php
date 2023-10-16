<?php

class BaseRepository
{

  private $_db;

  protected function readOne($id, $table, $column, $obj)
  {
    $this->_db = DataBase::get();
    try {
      $result = null;

      $stm = $this->_db->prepare(
        "SELECT * FROM $table
        WHERE $column = :id"
      );
      $stm->execute([
        'id' => $id
      ]);

      $data = $stm->fetchObject("$obj");

      if ($data) {
        $result = $data;
      }
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }
  protected function readAll($table, $obj)
  {
    $this->_db = DataBase::get();
    $result = [];
    try {
      $stm = $this->_db->prepare("SELECT * FROM $table");
      $stm->execute();
      $result = $stm->fetchAll(PDO::FETCH_CLASS, "$obj");
    } catch (PDOException $e) {
      var_dump($e);
    } finally {
      $this->_db = null;
    }
    return $result;
  }
  protected function deleteOne($id, $table, $column)
  {
    $this->_db = DataBase::get();
    $stm = $this->_db->prepare(
      "DELETE FROM $table WHERE $column = :id"
    );
    $stm->execute([
      'id' => $id
    ]);
    $this->_db = null;
    return $stm;
  }
}

?>
<?php

class Repository
{
  protected $db;
  protected $table;

  public function __construct($table)
  {
    $this->db = DataBase::get();
    $this->table = $table;
  }

  // Crear un nuevo registro
  public function create($data)
  {
    $this->db = DataBase::get();
    $columns = implode(", ", array_keys($data));
    $values = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($data);
  }

  // Leer uno o varios registros
  public function read($class, $conditions = [], $select = '*')
  {
    $this->db = DataBase::get();
    $sql = "SELECT $select FROM $this->table";

    if (!empty($conditions)) {
      $where = [];
      foreach ($conditions as $key => $value) {
        $where[] = "$key = :$key";
      }
      $sql .= " WHERE " . implode(" AND ", $where);
    }
    $stmt = $this->db->prepare($sql);
    $stmt->execute($conditions);
    if ($select != "*") {
      return $stmt->fetchObject("$class");
    } else {
      return $stmt->fetchAll(PDO::FETCH_CLASS, "$class");
    }
  }

  // Actualizar un registro existente
  public function update($column, $id, $data)
  {
    $this->db = DataBase::get();
    $set = [];
    foreach ($data as $key => $value) {
      $set[] = "$key = :$key";
    }
    $set = implode(", ", $set);

    $sql = "UPDATE $this->table SET $set WHERE $column = :id";
    $data['id'] = $id;
    $stmt = $this->db->prepare($sql);
    $stmt->execute($data);
  }

  // Eliminar un registro
  public function delete($column, $id)
  {
    $this->db = DataBase::get();
    $sql = "DELETE FROM $this->table WHERE $column = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
  }

  public function beginTransaction(){
    $this->db = DataBase::get();
    $this->db->beginTransaction();
  }
  public function commit(){
    $this->db = DataBase::get();
    $this->db->commit();
  }
  public function rollback(){
    $this->db = DataBase::get();
    $this->db->rollback();
  }
  public function close(){
    $this->db = null;
  }
}

?>

<?php

class Repository
{
  protected $db;
  protected $table;

  public function __construct($db, $table)
  {
    $this->pdo = $db;
    $this->table = $table;
  }

  // Método para crear un nuevo registro
  public function create($data)
  {
    $columns = implode(", ", array_keys($data));
    $values = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($data);
  }

  // Método para leer uno o varios registros
  public function read($class, $conditions = [], $select = '*')
  {
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

  // Método para actualizar un registro existente
  public function update($column, $id, $data)
  {
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

  // Método para eliminar un registro
  public function delete($column, $id)
  {
    $sql = "DELETE FROM $this->table WHERE $column = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
  }
}

?>
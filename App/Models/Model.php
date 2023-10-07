<?php

class Model
{
  protected $table;
  protected $db;

  public function __construct()
  {
    $this->db = Container::resolve(DataBase::class);
  }

  protected function all()
  {
    try {
      $query = "SELECT * FROM {$this->table}";
      $result = $this->db->query($query);
      return $result->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    } finally {
      $this->db->cerrarConexion();
    }
  }

  public function find($id, $column_id)
  {
    try {
      //code...
    } catch (\Throwable $th) {
      //throw $th;
    }
    $query = "SELECT * FROM {$this->table} WHERE $column_id = ?";
    $result = $this->db->query($query, [$id]);
    $row = $result->fetch();
    if ($row !== false) {
      return $row;
    } else {
      return false;
    }
  }

  protected function create($data)
  {
    $columns = implode(', ', array_keys($data));
    $values = implode(', ', array_fill(0, count($data), '?'));

    $query = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
    $this->db->query($query, array_values($data));

    return $this->db->lastInsertId();
  }

  protected function update($id, $column_id, $data)
  {
    $columns = [];
    foreach ($data as $column => $value) {
      $columns[] = "$column = ?";
    }
    $columns = implode(', ', $columns);

    $query = "UPDATE {$this->table} SET {$columns} WHERE $column_id = ?";
    $data["$column_id"] = $id;

    $statement = $this->db->query($query, array_values($data));
    $rowCount = $statement->rowCount();
    if ($rowCount > 0) {
      return true;
    } else {
      return false;
    }
  }

  protected function delete($id, $column_id)
  {
    $query = "DELETE FROM {$this->table} WHERE $column_id = ?";
    $statement = $this->db->query($query, [$id]);
    $rowCount = $statement->rowCount();
    if ($rowCount > 0) {
      return true;
    } else {
      return false;
    }
  }
}
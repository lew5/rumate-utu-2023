<?php

class Repository
{
  protected $db;
  protected $table;
  protected $idColumn;
  protected $class;

  public function __construct($table, $idColumn, $class)
  {
    $this->db = DataBase::get();
    $this->table = $table;
    $this->idColumn = $idColumn;
    $this->class = $class;
  }

  // Crear un nuevo registro
  public function create($data)
  {
    try {
      $this->db = DataBase::get();
      $columns = implode(", ", array_keys($data));
      $values = ":" . implode(", :", array_keys($data));
      $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
      $stmt = $this->db->prepare($sql);
      var_dump($sql);
      $stmt->execute($data);
      var_dump("ok");
    } catch (PDOException $e) {
      var_dump($e->errorInfo);
    }

  }

  // Leer uno o varios registros
  public function read($conditions = [], $select = '*')
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
    $stmtFetchAll = $stmt->fetchAll(PDO::FETCH_CLASS, "$this->class");
    if (empty($stmtFetchAll)) {
      return null;
    }
    if (count($stmtFetchAll) == 1) {
      return $stmtFetchAll[0]; // Devolver el primer objeto
    } else {
      return $stmtFetchAll;
    }
  }

  // Actualizar un registro existente
  public function update($id, $data)
  {
    $this->db = DataBase::get();
    $set = [];
    foreach ($data as $key => $value) {
      $set[] = "$key = :$key";
    }
    $set = implode(", ", $set);

    $sql = "UPDATE $this->table SET $set WHERE $this->idColumn = :id";
    $data['id'] = $id;
    $stmt = $this->db->prepare($sql);
    $stmt->execute($data);
  }

  // Eliminar un registro
  public function delete($id)
  {
    $this->db = DataBase::get();
    $sql = "DELETE FROM $this->table WHERE $this->idColumn = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
  }

  public function search($searchTerm, $searchColumn, $select = '*')
  {
    $searchTerm = urldecode($searchTerm);
    $searchTerm = preg_quote($searchTerm, '~');
    $this->db = DataBase::get();
    $sql = "SELECT $select FROM $this->table WHERE $searchColumn LIKE :searchTerm";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS, $this->class);
  }


  public function lastInsertId()
  {
    return $this->db->lastInsertId();
  }

  public function beginTransaction()
  {
    $this->db = DataBase::get();
    $this->db->beginTransaction();
  }
  public function commit()
  {
    $this->db = DataBase::get();
    $this->db->commit();
  }
  public function rollback()
  {
    $this->db = DataBase::get();
    $this->db->rollback();
  }
  public function close()
  {
    $this->db = null;
  }
}

?>
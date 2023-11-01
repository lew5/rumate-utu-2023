<?php


class QueryBuilder
{
  private $pdo;
  private $query;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
    $this->query = new stdClass();
    $this->query->select = '';
    $this->query->from = '';
    $this->query->where = '';
    $this->query->join = '';
    $this->query->like = '';
    $this->query->insert = '';
    $this->query->update = '';
    $this->query->delete = '';
    $this->query->groupby = '';
    $this->query->having = '';
    $this->query->orderby = '';
    $this->query->limit = '';
    $this->transactionStarted = false;
  }

  /**
   * Selecciona las columnas a recuperar en la consulta SELECT.
   *
   * @param string|array $columns Las columnas a seleccionar.
   * @return $this
   */
  public function select($columns = '*')
  {
    if (is_array($columns)) {
      $this->query->select = implode(', ', $columns);
    } else {
      $this->query->select = $columns;
    }
    return $this;
  }

  /**
   * Especifica la tabla desde la cual se realizará la consulta.
   *
   * @param string $table El nombre de la tabla.
   * @return $this
   */
  public function from($table)
  {
    $this->query->from = $table;
    return $this;
  }

  /**
   * Agrega una condición WHERE a la consulta.
   *
   * @param string $condition La condición WHERE.
   * @return $this
   */
  public function where($condition)
  {
    $this->query->where = $condition;
    return $this;
  }

  /**
   * Realiza una cláusula JOIN en la consulta.
   *
   * @param string $table El nombre de la tabla a unir.
   * @param string $on La condición de unión.
   * @return $this
   */
  public function join($table, $on)
  {
    if (empty($this->query->join)) {
      $this->query->join = " JOIN $table ON $on";
    } else {
      $this->query->join .= " JOIN $table ON $on";
    }
    return $this;
  }

  /**
   * Agrega una condición LIKE a la consulta.
   *
   * @param string $column La columna en la que aplicar LIKE.
   * @param string $value El valor a buscar.
   * @return $this
   */
  public function like($column, $value)
  {
    $this->query->like = " $column LIKE '%$value%'";
    return $this;
  }

  /**
   * Realiza una inserción de datos en la tabla especificada y devuelve el último ID insertado.
   *
   * @param string $table La tabla en la que insertar datos.
   * @param array $data Los datos a insertar.
   * @return int El último ID insertado.
   */
  public function insert($table, $data)
  {
    $columns = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);

    return $this->pdo->lastInsertId();
  }

  /**
   * Realiza una actualización de datos en la tabla especificada y devuelve el número de filas afectadas.
   *
   * @param string $table La tabla en la que actualizar datos.
   * @param array $data Los datos a actualizar.
   * @return int El número de filas afectadas.
   */
  public function update($table, $data)
  {
    $set = '';
    foreach ($data as $column => $value) {
      $set .= "$column = :$column, ";
    }
    $set = rtrim($set, ', ');

    $sql = "UPDATE $table SET $set";
    if (!empty($this->query->where)) {
      $sql .= " WHERE {$this->query->where}";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
    return $stmt->rowCount();
  }

  /**
   * Realiza una eliminación de datos en la tabla especificada y devuelve el número de filas afectadas.
   *
   * @param string $table La tabla en la que eliminar datos.
   * @return int El número de filas afectadas.
   */
  public function delete($table)
  {
    $sql = "DELETE FROM $table";
    if (!empty($this->query->where)) {
      $sql .= " WHERE {$this->query->where}";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
  }

  /**
   * Especifica una cláusula GROUP BY en la consulta.
   *
   * @param string|array $columns Las columnas para agrupar.
   * @return $this
   */
  public function groupBy($columns)
  {
    $this->query->groupby = $columns;
    return $this;
  }

  /**
   * Agrega una condición HAVING a la consulta.
   *
   * @param string $condition La condición HAVING.
   * @return $this
   */
  public function having($condition)
  {
    $this->query->having = $condition;
    return $this;
  }

  /**
   * Especifica una cláusula ORDER BY en la consulta.
   *
   * @param string|array $columns Las columnas para ordenar.
   * @return $this
   */
  public function orderBy($columns)
  {
    $this->query->orderby = $columns;
    return $this;
  }

  /**
   * Limita el número de filas devueltas en la consulta.
   *
   * @param int $limit El número máximo de filas a recuperar.
   * @return $this
   */
  public function limit($limit)
  {
    $this->query->limit = $limit;
    return $this;
  }

  /**
   * Inicia una transacción.
   */
  public function beginTransaction()
  {
    $this->pdo->beginTransaction();
    $this->transactionStarted = true;
  }

  /**
   * Confirma una transacción.
   */
  public function commit()
  {
    if ($this->transactionStarted) {
      $this->pdo->commit();
      $this->transactionStarted = false;
    }
  }

  /**
   * Revierte una transacción.
   */
  public function rollback()
  {
    if ($this->transactionStarted) {
      $this->pdo->rollBack();
      $this->transactionStarted = false;
    }
  }

  /**
   * Ejecuta la consulta construida y devuelve los resultados.
   *
   * @return array Los resultados de la consulta.
   */
  public function execute()
  {
    // Construye la consulta completa y ejecuta
    $sql = "SELECT {$this->query->select} FROM {$this->query->from}";
    if (!empty($this->query->join)) {
      $sql .= $this->query->join;
    }
    if (!empty($this->query->where)) {
      $sql .= " WHERE {$this->query->where}";
    }
    if (!empty($this->query->groupby)) {
      $sql .= " GROUP BY {$this->query->groupby}";
      if (!empty($this->query->having)) {
        $sql .= " HAVING {$this->query->having}";
      }
    }
    if (!empty($this->query->orderby)) {
      $sql .= " ORDER BY {$this->query->orderby}";
    }
    if (!empty($this->query->limit)) {
      $sql .= " LIMIT {$this->query->limit}";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>
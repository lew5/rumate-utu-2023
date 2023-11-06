<?php
/**
 * Clase Repository
 *
 * La clase `Repository` proporciona métodos para realizar operaciones comunes en una base de datos, como crear, leer, actualizar y eliminar registros. Esta clase se utiliza como una capa intermedia entre la aplicación y la base de datos para abstraer la lógica de acceso a datos.
 */
class Repository
{
  /**
   * @var PDO La instancia de la clase PDO que representa la conexión a la base de datos.
   */
  protected $db;

  /**
   * @var string El nombre de la tabla en la base de datos con la que interactúa esta clase.
   */
  protected $table;

  /**
   * @var string El nombre de la columna de identificación única (ID) en la tabla.
   */
  protected $idColumn;

  /**
   * @var string El nombre de la clase utilizada para mapear los resultados de la consulta a objetos.
   */
  protected $class;

  /**
   * Constructor de la clase Repository.
   *
   * @param string $table El nombre de la tabla en la base de datos.
   * @param string $idColumn El nombre de la columna de identificación única (ID).
   * @param string $class El nombre de la clase utilizada para mapear los resultados de la consulta a objetos.
   */
  public function __construct($table, $idColumn, $class)
  {
    $this->db = DataBase::get();
    $this->table = $table;
    $this->idColumn = $idColumn;
    $this->class = $class;
  }

  /**
   * Crea un nuevo registro en la base de datos.
   *
   * @param array $data Un arreglo asociativo que contiene los datos del nuevo registro.
   */
  public function create($data)
  {
    $this->db = DataBase::get();
    $columns = implode(", ", array_keys($data));
    $values = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($data);
  }

  /**
   * Lee uno o varios registros de la base de datos.
   *
   * @param array $conditions Un arreglo asociativo que contiene condiciones para filtrar los registros.
   * @param string $select Una cadena que especifica las columnas que se deben seleccionar (por defecto, todas las columnas).
   * @return mixed|null Devuelve un objeto o una lista de objetos que representan los registros, o null si no se encontraron registros.
   */
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

  /**
   * Actualiza un registro existente en la base de datos.
   *
   * @param mixed $id El valor de la columna de identificación única (ID) del registro que se va a actualizar.
   * @param array $data Un arreglo asociativo que contiene los datos actualizados del registro.
   */
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

  /**
   * Elimina un registro de la base de datos.
   *
   * @param mixed $id El valor de la columna de identificación única (ID) del registro que se va a eliminar.
   */
  public function delete($id)
  {
    $this->db = DataBase::get();
    $sql = "DELETE FROM $this->table WHERE $this->idColumn = :id";

    $stmt = $this->db->prepare($sql);
    $stmt->execute(['id' => $id]);
  }

  /**
   * Busca registros en la base de datos que coincidan con un término de búsqueda en una columna específica.
   *
   * @param string $searchTerm El término de búsqueda.
   * @param string $searchColumn El nombre de la columna en la que se realiza la búsqueda.
   * @param string $select Una cadena que especifica las columnas que se deben seleccionar (por defecto, todas las columnas).
   * @return mixed|null Devuelve un objeto o una lista de objetos que representan los registros que coinciden con el término de búsqueda, o null si no se encontraron registros.
   */
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

  /**
   * Obtiene el último ID insertado en la base de datos.
   *
   * @return string El ID del último registro insertado.
   */
  public function lastInsertId()
  {
    return $this->db->lastInsertId();
  }

  /**
   * Inicia una transacción en la base de datos.
   */
  public function beginTransaction()
  {
    $this->db = DataBase::get();
    $this->db->beginTransaction();
  }

  /**
   * Confirma una transacción en la base de datos.
   */
  public function commit()
  {
    $this->db = DataBase::get();
    $this->db->commit();
  }

  /**
   * Revierte una transacción en la base de datos.
   */
  public function rollback()
  {
    $this->db = DataBase::get();
    $this->db->rollback();
  }

  /**
   * Cierra la conexión a la base de datos.
   */
  public function close()
  {
    $this->db = null;
  }
}
?>
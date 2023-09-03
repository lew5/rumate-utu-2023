<?php
/**
 * Clase Database
 * 
 * Esta clase proporciona una capa de abstracción de base de datos simple para ejecutar y obtener resultados de consultas SQL utilizando PDO.
 */
class Database
{
  private $connection;
  private $statement;

  /**
   * Constructor
   * 
   * Inicializa la conexión a la base de datos utilizando PDO y configura el modo de obtención para los resultados de las consultas.
   *
   * @param array $config Un array asociativo que contiene los parámetros de configuración para la conexión a la base de datos.
   * @param string $username El nombre de usuario de la base de datos.
   * @param string $password La contraseña de la base de datos.
   */
  public function __construct($config, $username, $password)
  {
    // Construye una cadena DSN (Data Source Name) basada en la configuración proporcionada
    $dsn = "mysql:" . http_build_query($config, "", ";");

    try {
      $this->connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Configura el modo de obtención predeterminado para devolver los resultados como arrays asociativos
      ]);
      // Configura el manejo de errores para lanzar excepciones en caso de errores
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      // Si hay un error al establecer la conexión a la base de datos, muestra un mensaje de error
      print("ERROR en la conexión: " . $e->getMessage());
    }
  }

  /**
   * Ejecuta una consulta SQL preparada
   *
   * @param string $query La consulta SQL que se va a ejecutar, con marcadores de posición para los parámetros (si los hay).
   * @param array $params Un array asociativo que contiene los valores de los parámetros para la sentencia preparada (si los hay).
   * @return Database La instancia actual de la clase Database para permitir el encadenamiento de métodos.
   */
  public function query($query, $params = [])
  {
    // Prepara la consulta SQL para su ejecución
    $this->statement = $this->connection->prepare($query);
    // Ejecuta la sentencia preparada con los parámetros proporcionados
    $this->statement->execute($params);
    // Devuelve la instancia actual de la clase Database para permitir el encadenamiento de métodos
    return $this;
  }

  /**
   * Obtiene todas las filas del resultado de la última consulta ejecutada.
   *
   * @return array Un array que contiene todas las filas obtenidas como arrays asociativos.
   */
  public function get()
  {
    return $this->statement->fetchAll();
  }

  /**
   * Obtiene la primera fila del resultado de la última consulta ejecutada.
   *
   * @return array|false La primera fila del resultado como array asociativo, o false si no se encontraron filas.
   */
  public function find()
  {
    return $this->statement->fetch();
  }

  public function lastIdInserted()
  {
    return $this->connection->lastInsertId();
  }

  public function beginTransaction()
  {
    return $this->connection->beginTransaction();
  }
  public function commit()
  {
    return $this->connection->commit();
  }
  public function rollBack()
  {
    return $this->connection->rollBack();
  }

  /**
   * Obtiene la primera fila del resultado de la última consulta ejecutada o aborta si no se encuentran resultados.
   *
   * @return array La primera fila del resultado como array asociativo.
   */
  public function findOrFail()
  {
    // Obtiene la primera fila utilizando el método find()
    $result = $this->find();
    if (!$result) {
      // Si no se encontraron filas, llama a la función 'abort()' para manejar el error
      abort();
    } else {
      return $result; // Devuelve la primera fila si se encontró
    }
  }

}
?>
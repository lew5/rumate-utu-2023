<?php
/**
 * Clase Database
 * 
 * Esta clase proporciona una capa de abstracción de base de datos simple para ejecutar y obtener resultados de consultas SQL utilizando PDO.
 */
class DataBase
{
  private $connection;
  private $statement;
  public function __construct($config, $username, $password)
  {
    // Construye una cadena DSN (Data Source Name) basada en la configuración proporcionada
    $dsn = "mysql:" . http_build_query($config, "", ";");

    try {
      $this->connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Error");
      $view->assign("error", $e->getCode());
      $view->render(BASE_PATH . "/Resources/Views/db-error.php");
      die;
      // print("ERROR en la conexión: " . $e->getMessage());
    }
  }
  public function query($query, $params = [])
  {
    try {
      $this->statement = $this->connection->prepare($query);
      $this->statement->execute($params);
      return $this->statement;
    } catch (PDOException $e) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Error");
      $view->assign("error", $e->getCode());
      $view->render(BASE_PATH . "/Resources/Views/db-error.php");
      die;
      // print("ERROR al ejecutar la consulta: " . $e->getMessage());
    }
  }

  public function lastInsertId()
  {
    return $this->connection->lastInsertId();
  }

  public function cerrarConexion()
  {
    $this->statement = null;
    $this->connection = null;
  }
}
?>
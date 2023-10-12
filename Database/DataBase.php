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
  private $config;
  private $username = "root";
  private $password = "";
  public function __construct()
  {
    $this->config = require BASE_PATH . "/Config/config.php";
    $this->conectar();
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
      $view->assign("error", "ERROR al ejecutar la consulta: " . $e->getMessage());
      $view->render(BASE_PATH . "/Resources/Views/Errores/db-error.php");
      die;
    }
  }

  public function cerrarConexion()
  {
    $this->statement = null;
    $this->connection = null;
  }

  public function getConnection()
  {
    return $this->connection;
  }

  public function conectar()
  {
    // Construye una cadena DSN (Data Source Name) basada en la configuración
    $dsn = "mysql:" . http_build_query($this->config['database'], "", ";");
    try {
      $this->connection = new PDO($dsn, $this->username, $this->password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Error");
      $view->assign("error", "ERROR en la conexión" . $e->getCode());
      $view->render(BASE_PATH . "/Resources/Views/Errores/db-error.php");
      die;
    }
  }
}
?>
<?php
require_once BASE_PATH . "/Config/config.php";
class DataBase
{
  private static $_db;

  public static function get()
  {
    if (!self::$_db) {
      $dsn = "mysql:" . http_build_query(__CONFIG__['database']['dsn'], "", ";");
      $pdo = new PDO(
        $dsn,
        __CONFIG__['database']['user'],
        __CONFIG__['database']['password']
      );
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      self::$_db = $pdo;
    }

    return self::$_db;
  }
  // public function __construct()
  // {
  // }
  // public function query($query, $params = [])
  // {
  //   try {
  //     $this->statement = $this->connection->prepare($query);
  //     $this->statement->execute($params);
  //     return $this->statement;
  //   } catch (PDOException $e) {
  //     $view = Container::resolve(View::class);
  //     $view->assign("title", "Rumate - Error");
  //     $view->assign("error", "NO SE PUDO EJECUTAR LA CONSULTA.<br>");
  //     $view->assign("errorMessage", "" . $e->getMessage());
  //     $view->render(BASE_PATH . "/Resources/Views/Errores/db-error.php");
  //     die;
  //   }
  // }

  // public function cerrarConexion()
  // {
  //   $this->statement = null;
  //   $this->connection = null;
  // }

  // public function getConnection()
  // {
  //   return $this->connection;
  // }

  // public function conectar()
  // {
  //   // Construye una cadena DSN (Data Source Name) basada en la configuración
  //   $dsn = "mysql:" . http_build_query($this->config['database'], "", ";");
  //   try {
  //     $this->connection = new PDO($dsn, $this->username, $this->password, [
  //       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  //     ]);
  //     $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   } catch (PDOException $e) {
  //     $view = Container::resolve(View::class);
  //     $view->assign("title", "Rumate - Error");
  //     $view->assign("error", "NO SE PUDO ESTABLECER LA CONEXIÓN CON LA BASE DE DATOS.<br>");
  //     $view->assign("errorMessage", "Error code: " . "<b>" . $e->getCode() . "</b>");
  //     $view->render(BASE_PATH . "/Resources/Views/Errores/db-error.php");
  //     die;
  //   }
  // }
}
?>
<?php
require_once BASE_PATH . "/Config/config.php";
/**
 * Clase DataBase
 *
 * La clase `DataBase` proporciona una instancia de una conexión a la base de datos utilizando la extensión PDO (PHP Data Objects). Esta clase se utiliza para establecer y gestionar la conexión a la base de datos.
 */
class DataBase
{
  /**
   * @var PDO|null El atributo estático `$_db` almacena una instancia de la clase PDO para interactuar con la base de datos. Es una instancia compartida para evitar múltiples conexiones a la base de datos.
   */
  private static $_db = null;

  /**
   * Obtiene una instancia de la base de datos.
   *
   * @return PDO La instancia de la clase PDO que representa la conexión a la base de datos.
   */
  public static function get()
  {
    try {
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
    } catch (PDOException $e) {
      // En caso de una excepción en la conexión a la base de datos, se maneja con una función "abort(500)".
      // La función "abort(500)" podría estar definida en otro lugar para manejar errores internos del servidor.
      abort(500);
    }
  }
}
?>
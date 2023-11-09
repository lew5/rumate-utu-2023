<?php
require_once BASE_PATH . "/Config/config.php";
class DataBase
{
  private static $_db;

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
      abort(500);
    }
  }
}
?>
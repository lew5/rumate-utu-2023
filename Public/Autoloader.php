<?php

$base = dirname(__DIR__);
define('BASE_PATH', $base);
const PUBLIC_PATH = __DIR__;


require_once BASE_PATH . "/App/Container/Container.php";
require_once BASE_PATH . "/Bootstrap/bootstrap.php";
require_once BASE_PATH . "/App/Helpers/sessions.php";
require_once BASE_PATH . "/App/Helpers/http-codes.php";
require_once BASE_PATH . "/App/Helpers/fechas.php";
require BASE_PATH . "/vendor/autoload.php";

class Autoloader
{
  public static $basePaths = [
    BASE_PATH . "/App/",
    BASE_PATH . "/App/Routes/",
    BASE_PATH . "/App/Models/",
    BASE_PATH . "/Resources/Views/",
    BASE_PATH . "/App/Http/Controllers/",
    BASE_PATH . "/App/Http/Middleware/",
    BASE_PATH . "/Database/",
    //* Agrega otras ubicaciones de clases si es necesario
  ];


  public static function loadClass($className)
  {
    foreach (self::$basePaths as $basePath) {
      $classFile = $basePath . $className . ".php";
      if (file_exists($classFile)) {
        //var_dump($classFile . " ✅ EXISTE"); //!TEST
        require_once $classFile;
        return;
      } else {
        //var_dump($classFile . " ⛔ NO EXISTE"); //!TEST
      }
    }
  }
}

spl_autoload_register("Autoloader::loadClass");
require_once BASE_PATH . "/App/Routes/web.php";
?>
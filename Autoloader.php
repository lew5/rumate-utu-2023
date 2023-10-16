<?php

$base = __DIR__;
define('BASE_PATH', $base);
$public = basename(__DIR__);
define('PUBLIC_PATH', "/" . $public);


require_once BASE_PATH . "/App/Container/Container.php";
require_once BASE_PATH . "/App/Helpers/sessions.php";
require_once BASE_PATH . "/App/Helpers/http-codes.php";
require_once BASE_PATH . "/App/Helpers/fechas.php";
// require BASE_PATH . "/vendor/autoload.php";

class Autoloader
{
  public static $basePaths = [];

  public static function loadClass($className)
  {
    foreach (self::$basePaths as $basePath) {
      $classFile = $basePath . $className . ".php";
      if (file_exists($classFile)) {
        require_once $classFile;
        return;
      }
    }
  }
}

Autoloader::$basePaths[] = BASE_PATH . "/App/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Routes/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Models/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Services/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Repositories/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Helpers/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Http/Controllers/";
Autoloader::$basePaths[] = BASE_PATH . "/App/Http/Middleware/";
Autoloader::$basePaths[] = BASE_PATH . "/Resources/Views/";
Autoloader::$basePaths[] = BASE_PATH . "/Database/";

// Usando glob() para encontrar todas las subcarpetas en /App/
$subdirectories = glob(BASE_PATH . "/App/Models/*", GLOB_ONLYDIR);

// Agrega todas las subcarpetas a $basePaths
foreach ($subdirectories as $subdirectory) {
  Autoloader::$basePaths[] = $subdirectory . "/";
}

spl_autoload_register("Autoloader::loadClass");
require_once BASE_PATH . "/App/Routes/web.php";
?>
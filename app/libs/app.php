<?php
class App
{
  function __construct()
  {
    print("app/libs/app.php > ");
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = str_replace('public/', '', $url);
    $url = rtrim($url, "/");
    $url = explode("/", $url);
    $archivoController = count($url) > 0 ? "../app/controllers/" . $url[0] . ".php" : false;

    if (file_exists($archivoController)) {
      require_once $archivoController;
      $controller = new $url[0];

      if (isset($url[1])) {
        $controller->{$url[1]}();
      }
    } else {
      //TODO: manejo de errores en caso de no encontrar el controlador
    }
  }
}
?>
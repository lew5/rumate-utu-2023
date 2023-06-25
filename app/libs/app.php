<?php
class App
{
  function __construct()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, "/");
    $url = explode("/", $url);
    $archivoController = "app/controllers/" . $url[0] . ".php";
    if (file_exists($archivoController)) {
      require_once $archivoController;
      $controller = new $url[0];
      if (isset($url[1])) {
        $controller->{$url[1]}();
      } else {

      }
    } else {
      require_once "app/controllers/ErrorController.php";
      $controller = new ErrorController();
    }
  }
}
?>
<?php
class Route
{
  private static $router;

  public function __construct($router)
  {
    self::$router = $router;
  }

  public static function get($uri, $controller)
  {
    self::$router->get($uri, $controller);
  }
  public static function post($uri, $controller)
  {
    self::$router->post($uri, $controller);
  }
  public static function put($uri, $controller)
  {
    self::$router->put($uri, $controller);
  }
  public static function delete($uri, $controller)
  {
    self::$router->delete($uri, $controller);
  }

  /**
   * Redirige a una ubicación específica en la aplicación.
   *
   * @param string $location La ubicación a la que se va a redirigir, relativa a la ruta pública de la aplicación.
   */
  public static function redirect($location = "")
  {
    header("Location: " . PUBLIC_PATH . $location);
    die();
  }

  public static function dispatch()
  {
    self::$router->dispatch();
  }
}

?>
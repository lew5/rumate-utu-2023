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
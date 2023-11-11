<?php
/**
 * Clase Router
 *
 * Esta clase se utiliza para definir rutas y gestionar las solicitudes de enrutamiento en una aplicación web.
 */
class Router
{
  private $routes = [];

  /**
   * Agrega una nueva ruta al enrutador.
   *
   * @param string $method     El método HTTP (GET, POST, PUT, DELETE, etc.).
   * @param string $uri        La URI de la ruta, que puede contener parámetros.
   * @param string $controller El controlador que se ejecutará cuando se acceda a la ruta.
   *
   * @return Router            Devuelve una instancia del enrutador para permitir encadenar llamadas.
   */
  private function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];

    return $this;
  }

  /**
   * Agrega una ruta GET al enrutador.
   *
   * @param string $uri        La URI de la ruta, que puede contener parámetros.
   * @param string $controller El controlador que se ejecutará cuando se acceda a la ruta.
   *
   * @return Router            Devuelve una instancia del enrutador para permitir encadenar llamadas.
   */
  public function get($uri, $controller)
  {
    $uri = urldecode($uri);
    $uri = str_replace('{id}', '(\d+)', $uri);
    $uri = str_replace('{idProveedor}', '(\w+)', $uri);
    $uri = str_replace('{nombre_remate}', '(.+)', $uri);
    $uri = str_replace('{categoria_lote}', '(.+)', $uri);
    $uri = str_replace('{idUsuario}', '(\d+)', $uri);
    $uri = str_replace('{idRemate}', '(\d+)', $uri);
    $uri = str_replace('{idLote}', '(\d+)', $uri);
    return $this->add("GET", $uri, $controller);
  }

  /**
   * Agrega una ruta POST al enrutador.
   *
   * @param string $uri        La URI de la ruta, que puede contener parámetros.
   * @param string $controller El controlador que se ejecutará cuando se acceda a la ruta.
   *
   * @return Router            Devuelve una instancia del enrutador para permitir encadenar llamadas.
   */
  public function post($uri, $controller)
  {
    $uri = str_replace('{idUsuario}', '(\d+)', $uri);
    $uri = str_replace('{idRemate}', '(\d+)', $uri);
    $uri = str_replace('{idLote}', '(\d+)', $uri);
    return $this->add("POST", $uri, $controller);
  }

  /**
   * Agrega una ruta DELETE al enrutador.
   *
   * @param string $uri        La URI de la ruta, que puede contener parámetros.
   * @param string $controller El controlador que se ejecutará cuando se acceda a la ruta.
   *
   * @return Router            Devuelve una instancia del enrutador para permitir encadenar llamadas.
   */
  public function delete($uri, $controller)
  {
    return $this->add("DELETE", $uri, $controller);
  }

  /**
   * Enrutamiento de la solicitud HTTP.
   *
   * @param string $uri    La URI de la solicitud.
   * @param string $method El método HTTP de la solicitud (GET, POST, PUT, DELETE, etc.).
   *
   * @return mixed         Devuelve el resultado de la acción del controlador correspondiente.
   */
  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['method'] === strtoupper($method)) {
        $pattern = $this->buildRoutePattern($route['uri']);
        if (preg_match($pattern, $uri, $matches)) {
          list($controller, $action) = explode('@', $route['controller']);
          $controllerInstance = new $controller();

          // Llamar al método del controlador y pasar los parámetros coincidentes
          if (method_exists($controllerInstance, $action)) {
            return $controllerInstance->$action(...array_slice($matches, 1));
          } else {
            print("hola");
          }
        }
      }
    }
    // var_dump("en router");
    abort();
  }

  /**
   * Construye un patrón de ruta a partir de una URI con parámetros.
   *
   * @param string $uri La URI de la ruta con parámetros.
   *
   * @return string     Devuelve el patrón de ruta regex construido.
   */
  private function buildRoutePattern($uri)
  {
    return "~^{$uri}$~";
  }

  /**
   * Despacha la solicitud actual y enruta a la acción correspondiente.
   */
  public function dispatch()
  {
    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath = $_SERVER['REQUEST_URI'];
    $url = substr($urlPath, strlen($folderPath));
    $method = $_SERVER['REQUEST_METHOD'];
    $this->route($url, $method);
  }
}
?>
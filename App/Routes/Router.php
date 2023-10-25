<?php

class Router
{

  /**
   * @var array La lista de rutas disponibles.
   */
  private $routes = [];

  /**
   * Método add
   * 
   * Agrega una nueva ruta a la lista de rutas disponibles.
   * 
   * @param string $method El método HTTP para la ruta (GET, POST, DELETE, PUT, PATCH).
   * @param string $uri La ruta a la que se vincula el controlador.
   * @param string $controller El archivo que contiene el controlador para la ruta.
   * @return $this Devuelve la instancia actual de la clase Router para permitir el encadenamiento de métodos.
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
   * Método get
   * 
   * Agrega una nueva ruta para el método HTTP GET.
   * 
   * @param string $uri La ruta a la que se vincula el controlador.
   * @param string $controller El archivo que contiene el controlador para la ruta.
   * @return $this Devuelve la instancia actual de la clase Router para permitir el encadenamiento de métodos.
   */
  public function get($uri, $controller)
  {
    $uri = urldecode($uri);
    $uri = str_replace('{id}', '(\d+)', $uri);
    $uri = str_replace('{idProveedor}', '(\w+)', $uri);
    $uri = str_replace('{nombre_remate}', '(.+)', $uri);
    $uri = str_replace('{usuario}', '(.+)', $uri);
    $uri = str_replace('{idRemate}', '(\d+)', $uri);
    $uri = str_replace('{idLote}', '(\d+)', $uri);
    return $this->add("GET", $uri, $controller);
  }

  /**
   * Método post
   * 
   * Agrega una nueva ruta para el método HTTP POST.
   * 
   * @param string $uri La ruta a la que se vincula el controlador.
   * @param string $controller El archivo que contiene el controlador para la ruta.
   * @return $this Devuelve la instancia actual de la clase Router para permitir el encadenamiento de métodos.
   */
  public function post($uri, $controller)
  {
    $uri = str_replace('{usuario}', '(.+)', $uri);
    $uri = str_replace('{idRemate}', '(\d+)', $uri);
    $uri = str_replace('{idLote}', '(\d+)', $uri);
    return $this->add("POST", $uri, $controller);
  }

  /**
   * Método delete
   * 
   * Agrega una nueva ruta para el método HTTP DELETE.
   * 
   * @param string $uri La ruta a la que se vincula el controlador.
   * @param string $controller El archivo que contiene el controlador para la ruta.
   * @return $this Devuelve la instancia actual de la clase Router para permitir el encadenamiento de métodos.
   */
  public function delete($uri, $controller)
  {
    return $this->add("DELETE", $uri, $controller);
  }

  /**
   * Método put
   * 
   * Agrega una nueva ruta para el método HTTP PUT.
   * 
   * @param string $uri La ruta a la que se vincula el controlador.
   * @param string $controller El archivo que contiene el controlador para la ruta.
   * @return $this Devuelve la instancia actual de la clase Router para permitir el encadenamiento de métodos.
   */
  public function put($uri, $controller)
  {
    return $this->add("PUT", $uri, $controller);
  }

  /**
   * Método only
   * 
   * Asigna un middleware a la última ruta agregada.
   * 
   * @param string $key La clave del middleware a asignar a la última ruta.
   * @return void No hay retorno, simplemente asigna el middleware a la última ruta agregada.
   */
  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
  }

  /**
   * Método route
   * 
   * Realiza el enrutamiento de la solicitud a un controlador específico según la ruta y el método HTTP solicitados.
   * 
   * @param string $uri La ruta solicitada.
   * @param string $method El método HTTP de la solicitud (GET, POST, DELETE, PUT, PATCH).
   * @return mixed El resultado de la ejecución del controlador o llama a la función abort si la ruta no existe.
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
    var_dump("en router");
    abort();
  }

  private function buildRoutePattern($uri)
  {
    return "~^{$uri}$~";
  }


  public function dispatch()
  {

    // $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    // $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    // $this->route($uri, $method);


    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath = $_SERVER['REQUEST_URI'];
    $url = substr($urlPath, strlen($folderPath));
    // $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    $method = $_SERVER['REQUEST_METHOD'];
    $this->route($url, $method);

  }
}
?>
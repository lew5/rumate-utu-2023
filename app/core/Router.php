<?php

/**
 * Clase Router
 * 
 * Esta clase implementa un enrutador simple para manejar las rutas de una aplicación web.
 * Permite definir rutas para diferentes métodos HTTP y ejecutar el controlador correspondiente para una ruta solicitada.
 */
middleware("Middleware.php");
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
   * Método patch
   * 
   * Agrega una nueva ruta para el método HTTP PATCH.
   * 
   * @param string $uri La ruta a la que se vincula el controlador.
   * @param string $controller El archivo que contiene el controlador para la ruta.
   * @return $this Devuelve la instancia actual de la clase Router para permitir el encadenamiento de métodos.
   */
  public function patch($uri, $controller)
  {
    return $this->add("PATCH", $uri, $controller);
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
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        Middleware::resolve($route['middleware']);
        return require $route['controller'];
      }
    }
    $this->abort();
  }

  /**
   * Método abort
   * 
   * Termina la ejecución del script y envía un código de respuesta HTTP (predeterminado 404 NOT FOUND).
   * 
   * @param int $code El código de respuesta HTTP (por defecto, 404 NOT FOUND).
   * @return void No hay retorno, simplemente termina la ejecución del script con el código de respuesta especificado.
   */
  private function abort($code = 404)
  {

    http_response_code($code);
    // require("app/views/{$code}.php");
    die();

  }
}
?>
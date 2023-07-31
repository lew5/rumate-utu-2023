<?php

/**
 * Middleware
 *
 * Clase que permite resolver y ejecutar middlewares según su clave asociada.
 */
middleware("Guest.php");
class Middleware
{
  /**
   * Mapa de middlewares disponibles con sus claves asociadas.
   * 
   * @var array Un array asociativo con la clave del middleware como clave y la clase del middleware como valor.
   */
  public const MAP = [
    'guest' => Guest::class,
    'auth' => Auth::class
  ];

  /**
   * Resuelve y ejecuta un middleware según su clave asociada.
   *
   * @param string $key La clave del middleware a resolver y ejecutar.
   * @return void No hay retorno, ya que simplemente ejecuta el middleware.
   * @throws Exception Si la clave de middleware no se encuentra en el mapa.
   */
  public static function resolve($key)
  {
    if (!$key) {
      return;
    }

    $middleware = static::MAP[$key] ?? false;

    if (!$middleware) {
      throw new Exception("No hay conciencia para '$key'");
    }

    (new $middleware)->handle();
  }
}
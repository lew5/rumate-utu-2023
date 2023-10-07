<?php

class Middleware
{

  public const LIST = [
    'invitado' => InvitadoMiddleware::class,
    'usuario' => UsuarioMiddleware::class
  ];

  public static function resolve($key)
  {
    if (!$key) {
      return;
    }
    $middleware = self::LIST [$key] ?? false;
    if (!$middleware) {
      throw new Exception("No hay conciencia para '$key'");
    }
    (new $middleware)->handle();
  }
}

?>
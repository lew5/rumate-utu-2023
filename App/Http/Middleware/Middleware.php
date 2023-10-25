<?php

class Middleware
{
  public static function usuario($url)
  {
    return sessionUsuario() ? route::redirect($url) : false;
  }
  public static function root()
  {
    return sessionRoot() ? true : abort(403);
  }
  public static function admin()
  {
    return sessionAdmin() || sessionRoot() ? true : abort(403);
  }

  public static function cliente($url)
  {
    return sessionCliente() ? true : route::redirect($url);
  }

  public static function proveedor()
  {
    return sessionCliente() ? abort(403) : false;
  }

  public static function verPerfil($id)
  {
    if (sessionUsuario()) {
      if (sessionAdmin() || sessionRoot() || sessionUsuario()->getId() == $id) {
        return true;
      } else {
        abort(403);
      }
    } else {
      abort(403);
    }
  }


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
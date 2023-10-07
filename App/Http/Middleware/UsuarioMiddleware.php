<?php

class UsuarioMiddleware
{
  public static function handle()
  {
    if (!$_SESSION['usuario'] ?? false) {
      header("Location: /login"); //cambiar esto a /
      die();
    }
  }
}

?>
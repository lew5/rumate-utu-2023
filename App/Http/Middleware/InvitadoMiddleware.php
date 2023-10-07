<?php

class InvitadoMiddleware
{
  public static function handle()
  {
    if ($_SESSION['usuario'] ?? false) {
      header("Location: /");
      die();
    }
  }
}

?>
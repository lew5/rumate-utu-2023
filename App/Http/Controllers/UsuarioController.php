<?php

class UsuarioController
{
  public static function iniciarSesion()
  {
    if (isset($_POST['login-btn'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $usuarioValidado = Container::resolve(LoginService::class)->login($username, $password);
      if ($usuarioValidado !== false) {
        $usuario = Container::resolve(UsuarioService::class)->getUsuarioByUsername($username);
        $serializedPersona = serialize($usuario);
        $_SESSION['usuario'] = $serializedPersona;
        header("Location: " . PUBLIC_PATH);
        die();
      } else {
        $_SESSION['loginError'] = [
          'error' => "Usuario o contraseña incorrectos.",
          'username' => $username
        ];
        header("Location: " . PUBLIC_PATH . "/login");
        die();
      }
    }
  }

  public static function cerrarSesion()
  {
    session_destroy();
    header("Location: " . PUBLIC_PATH);
  }
}

?>
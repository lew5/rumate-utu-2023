<?php

class AuthController
{
  private $authService;
  private $usuarioService;

  public function __construct()
  {
    $this->authService = Container::resolve(AuthService::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $usuarioValidado = $this->authService->login($username, $password);
      if ($usuarioValidado !== false) {
        $this->iniciarSession($username);
      } else {
        $this->errorSession($username);
      }
    }
  }

  public static function logout()
  {
    session_destroy();
    route::redirect();
  }

  private function iniciarSession($username)
  {
    $usuario = Container::resolve(UsuarioService::class)->getUsuarioByUsername($username);
    if ($usuario->getTipo() == "ADMINISTRADOR" || $usuario->getTipo() == "ROOT") {
      $usuario = serialize($usuario);
      $_SESSION['usuario'] = $usuario;
      route::redirect("/admin/remates");
    } else {
      $usuario = serialize($usuario);
      $_SESSION['usuario'] = $usuario;
      route::redirect();
    }
  }

  private function errorSession($username)
  {
    $_SESSION['loginError'] = [
      'error' => "Usuario o contraseña incorrectos.",
      'username' => $username
    ];
    route::redirect("/login");
  }
}

?>
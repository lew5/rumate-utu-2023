<?php

class LoginService
{
  private $usuarioService;

  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  public function login($username, $password)
  {
    $usuario = $this->usuarioService->getUsuarioByUsername($username);
    var_dump($usuario);
    if ($usuario !== null && password_verify($password, $usuario->getPassword())) {
      return true;
    }
    return false;
  }
}

?>
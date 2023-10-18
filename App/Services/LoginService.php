<?php

class LoginService
{
  private $_usuarioService;

  public function __construct()
  {
    $this->_usuarioService = Container::resolve(UsuarioService::class);
  }

  public function login($username, $password)
  {
    $usuario = $this->_usuarioService->getByUsername($username);
    if ($usuario !== null && password_verify($password, $usuario->getPassword())) {
      return true;
    }
    return false;
  }
}

?>
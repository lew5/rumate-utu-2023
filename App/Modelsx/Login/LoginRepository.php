<?php


class LoginRepository
{
  public static function validarDatos($username, $password)
  {
    $usuarioRepository = Container::resolve(UsuarioRepository::class);
    $usuario = $usuarioRepository->getUsuario($username);
    // password_verify($password, $usuario['password_usuario'])
    if ($usuario !== false && $password == $usuario['password_usuario']) {
      return true;
    } else {
      return false;
    }
  }
}

?>
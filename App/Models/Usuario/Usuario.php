<?php

class Usuario
{

  private $username;
  private $password;
  private $email;
  public function __construct()
  {
  }

  public static function iniciarSesion($username, $password)
  {
    $usuarioValidado = Container::resolve(LoginRepository::class)::validarDatos($username, $password);
    if ($usuarioValidado) {
      return Container::resolve(UsuarioRepository::class)->getFullUsuario($username);
    } else {
      return false;
    }
  }

  #region //* SETTERS Y GETTERS
  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = $username;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  #endregion
}
?>
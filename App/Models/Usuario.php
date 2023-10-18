<?php

class Usuario
{
  private $id;
  private $username_usuario;
  private $password_usuario;
  private $email_usuario;
  private $tipo_usuario;

  public function __construct(
    $username_usuario,
    $password_usuario,
    $email_usuario,
    $tipo_usuario
  ) {
    $this->username_usuario = $username_usuario;
    $this->password_usuario = $password_usuario;
    $this->email_usuario = $email_usuario;
    $this->tipo_usuario = $tipo_usuario;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getUsername()
  {
    return $this->username_usuario;
  }

  public function setUsername($username)
  {
    $this->username_usuario = $username;
  }

  public function getPassword()
  {
    return $this->password_usuario;
  }

  public function setPassword($password)
  {
    $this->password_usuario = $password;
  }

  public function getEmail()
  {
    return $this->email_usuario;
  }

  public function setEmail($email)
  {
    $this->email_usuario = $email;
  }

  public function getTipo()
  {
    return $this->tipo_usuario;
  }

  public function setTipo($tipo)
  {
    $this->tipo_usuario = $tipo;
  }

}

?>
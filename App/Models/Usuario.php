<?php

class Usuario
{
  private $id_usuario;

  private $imagen_usuario;
  private $username_usuario;
  private $password_usuario;
  private $email_usuario;
  private $tipo_usuario = "CLIENTE";

  public function getId()
  {
    return $this->id_usuario;
  }

  public function setId($id)
  {
    $this->id_usuario = $id;
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


  public function getImagen()
  {
    return $this->imagen_usuario;
  }

  public function setImagen($imagen)
  {
    $this->imagen_usuario = $imagen;
  }
}

?>
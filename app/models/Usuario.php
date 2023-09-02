<?php

class Usuario extends Database
{
  private $username;
  private $password;
  private $email;
  private $idPersonaUsuario;


  public function insert()
  {
    $this->query("INSERT INTO usuarios (
        username, 
        password, 
        email, 
        idPersona_usuario) 
      VALUES (
        :username, 
        :password, 
        :email, 
        :idPersonaUsuario)",
      [
        'username' => $this->username,
        'password' => password_hash($this->password, PASSWORD_BCRYPT),
        'email' => $this->email,
        'idPersonaUsuario' => $this->idPersonaUsuario
      ]
    );
  }

  public function delete($username)
  {
    $this->query("DELETE FROM usuarios WHERE username = :username", [
      'username' => $username
    ]);
  }

  public function update($username, $usuarioActualizado)
  {
    $this->query("UPDATE usuarios SET 
    username = :newUsername,
    password = :password, 
    email = :email, 
    idPersona_usuario = :idPersonaUsuario 
    WHERE username = :username", [
      'newUsername' => $usuarioActualizado['username'],
      'password' => password_hash($usuarioActualizado['password'], PASSWORD_BCRYPT),
      'email' => $usuarioActualizado['email'],
      'idPersonaUsuario' => $usuarioActualizado['idPersona_usuario'],
      'username' => $username
    ]);
  }

  public function getById($username)
  {
    return $this->query("SELECT * FROM usuarios WHERE username = :username", [
      'username' => $username
    ])->find();
  }

  public function getAll()
  {
    return $this->query("SELECT * FROM usuarios")->get();
  }

  // Getters y setters
  public function setUsername($username)
  {
    $this->username = $username;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setIdPersonaUsuario($idPersonaUsuario)
  {
    $this->idPersonaUsuario = $idPersonaUsuario;
  }

  public function getIdPersonaUsuario()
  {
    return $this->idPersonaUsuario;
  }
}


?>
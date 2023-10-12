<?php

class UsuarioModel extends Model
{

  private $username;
  private $password;
  private $email;
  private $tabla = "usuarios";
  public function __construct()
  {
    parent::__construct();
  }

  #region //* FUNCIONA 🟢
  public function getUsuarios()
  {
    return $this->all($this->tabla);
  }
  public function getUsuario($username)
  {
    return $this->find($this->tabla, $username, "username_usuario");
  }

  public function getFullUsuario($username)
  {
    $sql = "SELECT u.*, p.* FROM USUARIOS u
                  INNER JOIN USUARIOS_DE_PERSONAS up ON u.username_usuario = up.username_usuario_usuarios_de_personas
                  INNER JOIN PERSONAS p ON up.id_persona_usuarios_de_persona = p.id_persona
                  WHERE u.username_usuario = ?";

    return $this->sql($sql, false, $username);
  }
  #endregion


  // public function crearUsuario($data) 
  // {
  //   try {
  //     return $this->create($data);
  //   } catch (PDOException $e) {
  //     if ($e->getCode() == 1062) {
  //       return false;
  //     } else {
  //       return "Ese usuario ya existe";
  //     }
  //   }
  // }
  // public function actualizarUsuario($username, $data)
  // {
  //   return $this->update($username, "username_usuario", $data);
  // }
  // public function borrarUsuario($username)
  // {
  //   return $this->delete($username, "username_usuario");
  // }

  // public function asignarPersonaAUsuario($username, $idPersona)
  // {
  //   $query = "INSERT INTO USUARIOS_DE_PERSONAS (username_usuario_usuarios_de_personas, id_persona_usuarios_de_persona) VALUES (?, ?)";
  //   $stmt = $this->db->query($query, [$username, $idPersona]);
  //   if ($stmt) {
  //     return true;
  //   } else {
  //     return false;
  //   }
  // }

  // public function obtenerPersonaDeUsuario($username)
  // {
  //   $query = "SELECT p.* FROM PERSONAS p
  //                 INNER JOIN USUARIOS_DE_PERSONAS up ON p.id_persona = up.id_persona_usuarios_de_persona
  //                 WHERE up.username_usuario_usuarios_de_personas = ?";
  //   $stmt = $this->db->query($query, [$username])->fetch();

  //   if ($stmt !== false) {
  //     return $stmt;
  //   } else {
  //     return false;
  //   }
  // }
  // public function getUsuarioCompletoPorNombre($username)
  // {
  //   $query = "SELECT u.*, p.* FROM USUARIOS u
  //                 INNER JOIN USUARIOS_DE_PERSONAS up ON u.username_usuario = up.username_usuario_usuarios_de_personas
  //                 INNER JOIN PERSONAS p ON up.id_persona_usuarios_de_persona = p.id_persona
  //                 WHERE u.username_usuario = ?";
  //   $stmt = $this->db->query($query, [$username])->fetch();

  //   if ($stmt !== false) {
  //     return $stmt;
  //   } else {
  //     return false;
  //   }
  // }

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
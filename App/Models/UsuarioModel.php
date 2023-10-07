<?php

class UsuarioModel extends Model
{

  public function __construct()
  {
    parent::__construct();
    $this->table = "usuarios";
  }


  public function crearUsuario(array $data) //
  {
    try {
      return $this->create($data);
    } catch (PDOException $e) {
      if ($e->getCode() == 1062) {
        return false;
      } else {
        return "Ese usuario ya existe";
      }
    }
  }
  public function actualizarUsuario(string $username, array $data): bool //✅
  {
    return $this->update($username, "username_usuario", $data);
  }
  public function borrarUsuario(string $username): bool //✅
  {
    return $this->delete($username, "username_usuario");
  }
  public function getTodosLosUsuarios(): array //
  {
    return $this->all();
  }
  public function getUsuarioPorNombre(string $username) //✅
  {
    return $this->find($username, "username_usuario");
  }

  public function asignarPersonaAUsuario($username, $idPersona) //✅
  {
    $query = "INSERT INTO USUARIOS_DE_PERSONAS (username_usuario_usuarios_de_personas, id_persona_usuarios_de_persona) VALUES (?, ?)";
    $stmt = $this->db->query($query, [$username, $idPersona]);
    if ($stmt) {
      return true;
    } else {
      return false;
    }
  }

  public function obtenerPersonaDeUsuario($username)
  {
    $query = "SELECT p.* FROM PERSONAS p
                  INNER JOIN USUARIOS_DE_PERSONAS up ON p.id_persona = up.id_persona_usuarios_de_persona
                  WHERE up.username_usuario_usuarios_de_personas = ?";
    $stmt = $this->db->query($query, [$username])->fetch();

    if ($stmt !== false) {
      return $stmt;
    } else {
      return false;
    }
  }
  public function getUsuarioCompletoPorNombre($username)
  {
    $query = "SELECT u.*, p.* FROM USUARIOS u
                  INNER JOIN USUARIOS_DE_PERSONAS up ON u.username_usuario = up.username_usuario_usuarios_de_personas
                  INNER JOIN PERSONAS p ON up.id_persona_usuarios_de_persona = p.id_persona
                  WHERE u.username_usuario = ?";
    $stmt = $this->db->query($query, [$username])->fetch();

    if ($stmt !== false) {
      return $stmt;
    } else {
      return false;
    }
  }
}
?>
<?php

class UsuarioRepository extends Model
{

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
}
?>
<?php
class UsuarioDePersona
{
  private $username_usuario_usuarios_de_personas;
  private $id_persona_usuarios_de_persona;

  public function getUsername()
  {
    return $this->username_usuario_usuarios_de_personas;
  }

  public function setUsername($username)
  {
    $this->username_usuario_usuarios_de_personas = $username;
  }

  public function getIdPersona()
  {
    return $this->id_persona_usuarios_de_persona;
  }

  public function setIdPersona($idPersona)
  {
    $this->id_persona_usuarios_de_persona = $idPersona;
  }
}

?>
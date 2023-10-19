<?php
class UsuarioDePersona
{
  private $id_usuario_usuarios_de_personas;
  private $id_persona_usuarios_de_persona;

  public function getIdUsuario()
  {
    return $this->id_usuario_usuarios_de_personas;
  }

  public function setIdUsuario($idUsuario)
  {
    $this->id_usuario_usuarios_de_personas = $idUsuario;
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
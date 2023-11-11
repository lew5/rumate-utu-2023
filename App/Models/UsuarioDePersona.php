<?php
/**
 * Clase UsuarioDePersona
 *
 * La clase `UsuarioDePersona` representa una entidad en la aplicación que establece la relación entre un usuario y una persona. Se utiliza para gestionar la asociación entre usuarios y personas.
 */
class UsuarioDePersona
{
  /**
   * @var int El atributo `$id_usuario_usuarios_de_personas` almacena el identificador único del usuario relacionado con una persona.
   */
  private $id_usuario_usuarios_de_personas;

  /**
   * @var int El atributo `$id_persona_usuarios_de_persona` almacena el identificador único de la persona relacionada con un usuario.
   */
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
<?php
/**
 * Clase Usuario
 *
 * La clase `Usuario` representa una entidad en la aplicación que almacena información sobre usuarios. Se utiliza para gestionar detalles como el identificador, imagen de perfil, nombre de usuario, contraseña, dirección de correo electrónico y tipo de usuario.
 */
class Usuario
{
  /**
   * @var int El atributo `$id_usuario` almacena el identificador único del usuario.
   */
  private $id_usuario;

  /**
   * @var string El atributo `$imagen_usuario` guarda la imagen de perfil del usuario.
   */
  private $imagen_usuario;

  /**
   * @var string El atributo `$username_usuario` almacena el nombre de usuario del usuario.
   */
  private $username_usuario;

  /**
   * @var string El atributo `$password_usuario` guarda la contraseña del usuario.
   */
  private $password_usuario;

  /**
   * @var string El atributo `$email_usuario` almacena la dirección de correo electrónico del usuario.
   */
  private $email_usuario;

  /**
   * @var string El atributo `$tipo_usuario` representa el tipo de usuario, inicializado en "CLIENTE".
   */
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
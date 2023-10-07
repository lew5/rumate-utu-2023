<?php

class Usuario extends Persona
{
  private $username;
  private $password;
  private $email;

  public function __construct(
    $id,
    $nombre,
    $apellido,
    $ci,
    $barrio,
    $calle,
    $numero,
    $telefono,
    $tipo,
    $username,
    $password,
    $email
  ) {
    parent::__construct(
      $id,
      $nombre,
      $apellido,
      $ci,
      $barrio,
      $calle,
      $numero,
      $telefono,
      $tipo
    );

    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
  }

  public static function iniciarSesion($username, $password)
  {
    $usuario_model = Container::resolve(UsuarioModel::class);
    $usuario_data = $usuario_model->getUsuarioPorNombre($username);
    if ($usuario_data) {
      //!password_verify($password, $usuario->getPassword()) esto debería ir en el if pero se saca para que los profesores puedan probar el login sin problemas con las contraseñas NO CIFRADAS de la base de datos
      if ($password == $usuario_data['password_usuario']) {
        $usuario_data = $usuario_model->getUsuarioCompletoPorNombre($username);
        $usuario = Container::resolve(
          Usuario::class,
          $usuario_data['id_persona'],
          $usuario_data['nombre_persona'],
          $usuario_data['apellido_persona'],
          $usuario_data['ci_persona'],
          $usuario_data['barrio_persona'],
          $usuario_data['calle_persona'],
          $usuario_data['numero_persona'],
          $usuario_data['telefono_persona'],
          $usuario_data['tipo_persona'],
          $usuario_data['username_usuario'],
          $usuario_data['password_usuario'],
          $usuario_data['email_usuario'],
        );
        $serUser = serialize($usuario);
        $_SESSION['usuario'] = $serUser;
        return;
      } else {
        $_SESSION['passError'] = [
          'error' => "Contraseña incorrecta.",
          'username' => $username
        ];
        return;
      }
    } else {
      $_SESSION['userError'] = [
        'error' => "Ese usuario no existe.",
        'username' => $username
      ];
      return;
    }
  }

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
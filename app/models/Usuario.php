<?php

class Usuario extends Persona
{
  private string $username;
  private string $password;
  private string $email;

  public function __construct(
    int $id,
    string $nombre,
    string $apellido,
    string $ci,
    string $barrio,
    string $calle,
    string $numero,
    string $telefono,
    string $tipo,
    string $username,
    string $password,
    string $email
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
  public function getUsername(): string
  {
    return $this->username;
  }

  public function setUsername(string $username)
  {
    $this->username = $username;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password)
  {
    $this->password = $password;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email)
  {
    $this->email = $email;
  }

  #endregion

}

?>
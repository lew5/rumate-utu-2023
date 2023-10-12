<?php

class UsuarioController
{


  public static function iniciarSesion($username, $password)
  {
    $usuarioModel = Container::resolve(UsuarioModel::class);
    $usuarioData = $usuarioModel->getUsuario($username);

    if ($usuarioData) {
      $usuarioData = (object) $usuarioData;
      //!password_verify($password, $usuario->getPassword()) esto debería ir en el if pero se saca para que los profesores puedan probar el login sin problemas con las contraseñas NO CIFRADAS de la base de datos
      if ($password == $usuarioData->password_usuario) {
        $usuario = $usuarioModel->getFullUsuario($username);
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
}

?>
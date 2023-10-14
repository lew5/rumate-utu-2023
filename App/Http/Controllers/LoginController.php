<?php

class LoginController
{
  public function index()
  {
    Middleware::resolve("invitado");
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - login");
    $view->assign("h1", "Login");
    $view->assign("p", "Inicia sesión para poder participar en los remates.");
    $view->render(BASE_PATH . "/Resources/Views/Login/login.view.php");
    session_destroy();
  }

  public function validarLogin()
  {
    if (isset($_POST['login-btn'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $usuarioValidado = Usuario::iniciarSesion($username, $password);
      if ($usuarioValidado !== false) {
        $personaObj = Container::resolve(Persona::class);
        $personaObj->setUsername($usuarioValidado['username_usuario']);
        $personaObj->setEmail($usuarioValidado['email_usuario']);
        $personaObj->setId($usuarioValidado['id_persona']);
        $personaObj->setNombre($usuarioValidado['nombre_persona']);
        $personaObj->setApellido($usuarioValidado['apellido_persona']);
        $personaObj->setCi($usuarioValidado['ci_persona']);
        $personaObj->setBarrio($usuarioValidado['barrio_persona']);
        $personaObj->setBarrio($usuarioValidado['calle_persona']);
        $personaObj->setNumero($usuarioValidado['numero_persona']);
        $personaObj->setTelefono($usuarioValidado['telefono_persona']);
        $personaObj->setTipo($usuarioValidado['tipo_persona']);
        $serializedPersona = serialize($personaObj);
        $_SESSION['usuario'] = $serializedPersona;
        header("Location: " . PUBLIC_PATH);
        die();
      } else {
        $_SESSION['loginError'] = [
          'error' => "Usuario o contraseña incorrectos.",
          'username' => $username
        ];
        header("Location: " . PUBLIC_PATH . "/login");
        die();
      }
    }
  }
}

?>
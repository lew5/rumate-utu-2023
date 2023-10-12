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
      UsuarioController::iniciarSesion($username, $password);
      if (isset($_SESSION['usuario'])) {
        header("Location: " . PUBLIC_PATH);
        die();
      } else {
        header("Location: " . PUBLIC_PATH . "/login");
        die();
      }
    }
  }
}

?>
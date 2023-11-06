<?php

/**
 * Controlador para las acciones de inicio de sesión.
 */
class LoginController
{
  /**
   * Muestra la vista de inicio de sesión.
   * Aplica el middleware de usuario para garantizar el acceso.
   *
   * @return void
   */
  public function index()
  {
    Middleware::usuario("/");
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - login");
    $view->assign("h1", "Login");
    $view->assign("p", "Inicia sesión para poder participar en los remates.");
    $view->render(BASE_PATH . "/Resources/Views/Login/login.view.php");
    session_destroy();
  }
}

?>
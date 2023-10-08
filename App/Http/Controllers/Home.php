<?php

class Home
{
  public static function index()
  {
    // Middleware::resolve("usuario");
    $remate_model = Container::resolve(RemateModel::class);
    $remates_data = $remate_model->obtenerTodosLosRemates();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Home");
    $view->assign("header_title", "Remates");
    $view->assign("remates_data", $remates_data);
    $view->render(BASE_PATH . "/Resources/Views/home.view.php");
  }

  public static function logout()
  {
    session_destroy();
    header("Location: " . PUBLIC_PATH);
  }
}

?>
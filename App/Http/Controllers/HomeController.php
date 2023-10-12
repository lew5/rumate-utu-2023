<?php

class HomeController
{
  public static function index()
  {
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Home");
    $view->assign("header_title", "Remates");
    $view->render(BASE_PATH . "/Resources/Views/Home/home.view.php");
  }

  public static function logout()
  {
    session_destroy();
    header("Location: " . PUBLIC_PATH);
  }
}

?>
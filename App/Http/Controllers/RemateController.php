<?php

class RemateController
{
  public static function listarRemates()
  {
    $remates = Container::resolve(RemateService::class)->getRemates();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Home");
    $view->assign("header_title", "Remates");
    $view->assign("remates", $remates);
    $view->render(BASE_PATH . "/Resources/Views/Home/home.view.php");
  }

  public static function listarLotes($idRemate)
  {
    $remate = Container::resolve(RemateService::class)->getRemateById($idRemate);
    if ($remate != false) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Remate");
      $view->assign("header_title", "Lotes del remate  <span>#$idRemate</span>");
      $view->assign("remate", $remate);
      $view->render(BASE_PATH . "/Resources/Views/Remate/remate.view.php");
    } else {
      // abort();
    }
  }
}

?>
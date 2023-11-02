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


  public static function listarRematesPorTitulo($tituloRemate)
  {
    if ($tituloRemate == "*") {
      $remates = Container::resolve(RemateService::class)->getRemates();
      $view = Container::resolve(View::class);
      ob_start();
      $view->assign("remates", $remates);
      $view->render(BASE_PATH . "/Resources/Views/Remate/listar-remates.php");
      $partialView = ob_get_clean();
      echo $partialView;
    } else if ($tituloRemate) {
      $remates = Container::resolve(RemateService::class)->getRematesByTitle($tituloRemate);
      $view = Container::resolve(View::class);
      ob_start();
      $view->assign("remates", $remates);
      $view->render(BASE_PATH . "/Resources/Views/Remate/listar-remates.php");
      $partialView = ob_get_clean();
      echo $partialView;
    }
  }
}

?>
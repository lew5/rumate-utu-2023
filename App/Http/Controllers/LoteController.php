<?php

class LoteController
{
  public static function index($idRemate, $idLote)
  {
    $lote = Container::resolve(LoteService::class)->getLoteById($idLote);
    if ($lote != false) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Lote");
      $view->assign("header_title", "Lote <span>#$idRemate</span>");
      $view->assign("lote", $lote);
      $view->render(BASE_PATH . "/Resources/Views/Lote/lote.view.php");
    } else {
      abort();
    }
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
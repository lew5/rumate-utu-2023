<?php

class LoteController
{
  public static function index($idRemate, $idLote)
  {
    $loteModel = Container::resolve(LoteModel::class);
    $loteData = $loteModel->getLote($idRemate, $idLote);
    if ($loteData != false) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Lote");
      $view->assign("header_title", "Lote <span>#$idRemate</span>");
      $view->assign("lote", $loteData);
      $view->render(BASE_PATH . "/Resources/Views/Lote/lote.view.php");
    } else {
      abort();
    }
  }

}

?>
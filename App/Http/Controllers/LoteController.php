<?php

class LoteController
{
  public static function index($idRemate, $idLote)
  {
    $lote_model = Container::resolve(LoteModel::class);
    $lote_remate_data = $lote_model->getLote($idRemate, $idLote);
    $ficha = Container::resolve(Ficha::class)->llenarFicha($lote_remate_data);
    $lote = Container::resolve(Lote::class)->llenarLote($lote_remate_data, $ficha);
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Lote");
    $view->assign("header_title", "Lote <span>#$idRemate</span>");
    $view->assign("lote", $lote);
    $view->render(BASE_PATH . "/Resources/Views/lote.view.php");
  }

}

?>
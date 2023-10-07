<?php

class RemateController
{
  public static function index()
  {
    if (isset($_GET['id'])) {
      $idRemate = $_GET['id'];
      $lote_model = Container::resolve(LoteModel::class);
      $lotes_remate_data = $lote_model->obtenerTodosLosLotesDeRemate($idRemate);
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Lotes");
      $view->assign("header_title", "Lotes del remate  <span>#$idRemate</span>");
      $view->assign("lotes_remate", $lotes_remate_data);
      $view->render(BASE_PATH . "/Resources/Views/remate.view.php");
    }
  }

  public static function show($idRemate)
  {
    $lote_model = Container::resolve(LoteModel::class);
    $lotes_remate_data = $lote_model->obtenerTodosLosLotesDeRemate($idRemate);
    $lotes = [];
    foreach ($lotes_remate_data as $lte) {
      $ficha = Container::resolve(Ficha::class)->llenarFicha($lte);
      $lote = Container::resolve(Lote::class)->llenarLote($lte, $ficha);
      $lotes[] = $lote;
    }
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Remate");
    $view->assign("header_title", "Lotes del remate  <span>#$idRemate</span>");
    $view->assign("lotes", $lotes);
    $view->render(BASE_PATH . "/Resources/Views/remate.view.php");

  }
}

?>
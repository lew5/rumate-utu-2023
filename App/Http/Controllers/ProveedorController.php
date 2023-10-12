<?php

class ProveedorController
{
  public static function listarLotes($id)
  {
    if (sessionProveedor()) {
      $proveedorModel = Container::resolve(ProveedorModel::class);
      $lotes = $proveedorModel->getLotesDeProveedor($id);
      var_dump($lotes);
      die;
    } else {
      abort(403);
      die;
    }
    // die;
    // $view = Container::resolve(View::class);
    // $view->assign("title", "Rumate - Mis lotes");
    // $view->assign("header_title", "Mis lotes");
    // $view->assign("lotes", $lotes);
    // $view->render(BASE_PATH . "/Resources/Views/proveedor.view.php");
  }
}

?>
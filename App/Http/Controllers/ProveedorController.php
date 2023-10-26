<?php

class ProveedorController
{

  public function listarProveedores()
  {
    Middleware::admin();
    $proveedorService = Container::resolve(ProveedorService::class);
    $proveedores = $proveedorService->getProveedores();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Proveedores");
    $view->assign("header_title", "Proveedores");
    $view->assign("proveedores", $proveedores);
    $view->render(BASE_PATH . "/Resources/Views/Proveedor/proveedor.view.php");
  }
  public static function listarLotes($usernameProveedor)
  {
    Middleware::proveedor();
    if (sessionProveedor()) {
      $proveedorModel = Container::resolve(Proveedor::class);
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
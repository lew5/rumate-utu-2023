<?php

class ProveedorController
{

  public function listarProveedores()
  {
    Middleware::admin();
    $personaService = Container::resolve(PersonaService::class);
    $proveedores = $personaService->getPersonasConTipoProveedor();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Proveedores");
    $view->assign("header_title", "Proveedores");
    $view->assign("proveedores", $proveedores);
    $view->render(BASE_PATH . "/Resources/Views/Proveedor/proveedor.view.php");
  }

  public function listarLotes($idProveedor)
  {
    Middleware::proveedor();
    $loteService = Container::resolve(LoteService::class);
    $lotes = $loteService->getLotesDeProveedor($idProveedor);
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Lotes");
    $view->assign("header_title", "Mis lotes");
    $view->assign("lotes", $lotes);
    $view->render(BASE_PATH . "/Resources/Views/Proveedor/listar-lotes.php");
  }
}

?>
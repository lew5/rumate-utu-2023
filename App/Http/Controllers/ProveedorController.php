<?php
/**
 * Controlador para las acciones relacionadas con proveedores.
 */
class ProveedorController
{

  /**
   * Lista todos los proveedores.
   * 
   * @return void
   */
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

  /**
   * Lista los lotes de un proveedor.
   * 
   * @param int $idProveedor El ID del proveedor cuyos lotes se listarán.
   * 
   * @return void
   */
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
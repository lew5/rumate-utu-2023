<?php

class RootController
{
  public function listarAdministradores()
  {
    Middleware::root();
    $AdminService = Container::resolve(AdminService::class);
    $administradores = $AdminService->getAdministradores();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Empleados");
    $view->assign("header_title", "Empleados");
    $view->assign("administradores", $administradores);
    $view->render(BASE_PATH . "/Resources/Views/Administrador/admin.view.php");
  }
}

?>
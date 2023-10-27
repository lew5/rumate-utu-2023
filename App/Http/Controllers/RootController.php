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

  public function crearAdministrador()
  {
    Middleware::root();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Empleados");
    $view->assign("header_title", "Crear empleado");
    $view->render(BASE_PATH . "/Resources/Views/Root/crear-admin.php");
  }
}

?>
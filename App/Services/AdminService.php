<?php

final class AdminService
{

  private $usuarioService;
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }


  public function getAdministradores()
  {
    $usuarioAdmins = $this->usuarioService->getUsuariosByTipo("ADMINISTRADOR");
    $admins = [];
    if ($usuarioAdmins) {
      foreach ($usuarioAdmins as $usuarioAdmin) {
        $admin = $this->usuarioService->getPersonaByUsuarioId($usuarioAdmin->getId());
        $admin->setUsuario($usuarioAdmin);
        $admins[] = $admin;
      }
    } else {
      return false;
    }

    return $admins;
  }
}


?>
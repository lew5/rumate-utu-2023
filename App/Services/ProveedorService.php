<?php

final class ProveedorService
{

  private $personaService;
  public function __construct()
  {
    $this->personaService = Container::resolve(PersonaService::class);
  }


  public function getProveedores()
  {
    $usuarioProveedores = $this->usuarioService->getUsuariosByTipo("PROVEEDOR");
    $proveedores = [];
    if ($usuarioProveedores) {
      foreach ($usuarioProveedores as $usuarioProveedor) {
        $proveedor = $this->usuarioService->getPersonaByUsuarioId($usuarioProveedor->getId());
        $proveedor->setUsuario($usuarioProveedor);
        $proveedores[] = $proveedor;
      }
    } else {
      return false;
    }
    return $proveedores;
  }
}


?>
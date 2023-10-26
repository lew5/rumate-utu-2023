<?php

final class ProveedorService
{

  private $usuarioService;
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
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
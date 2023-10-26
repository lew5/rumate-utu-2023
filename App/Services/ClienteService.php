<?php

final class ClienteService
{

  private $usuarioService;
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }


  public function getClientes()
  {
    $usuarioClientes = $this->usuarioService->getUsuariosByTipo("CLIENTE");
    $clientes = [];
    foreach ($usuarioClientes as $usuarioCliente) {
      $cliente = $this->usuarioService->getPersonaByUsuarioId($usuarioCliente->getId());
      $cliente->setUsuario($usuarioCliente);
      $clientes[] = $cliente;
    }
    return $clientes;
  }
}


?>
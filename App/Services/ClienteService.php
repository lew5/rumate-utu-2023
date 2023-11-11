<?php

/**
 * La clase ClienteService se encarga de gestionar los clientes del sistema.
 */
final class ClienteService
{
  /**
   * @var UsuarioService Instancia del servicio de usuarios para obtener información de los clientes.
   */
  private $usuarioService;

  /**
   * Constructor de la clase ClienteService.
   * 
   * @return void
   */
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  /**
   * Obtiene todos los clientes registrados en el sistema.
   * 
   * @return array|bool Un array de objetos Cliente si existen clientes, o false si no hay ninguno.
   */
  public function getClientes()
  {
    $usuarioClientes = $this->usuarioService->getUsuariosByTipo("CLIENTE");
    $clientes = [];
    if ($usuarioClientes) {
      foreach ($usuarioClientes as $usuarioCliente) {
        $cliente = $this->usuarioService->getPersonaByUsuarioId($usuarioCliente->getId());
        $cliente->setUsuario($usuarioCliente);
        $clientes[] = $cliente;
      }
    } else {
      return false;
    }

    return $clientes;
  }
}

?>
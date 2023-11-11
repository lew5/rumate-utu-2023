<?php
class AdminService
{
  private $usuarioService;

  /**
   * Constructor de la clase AdminService. Inicializa una instancia de UsuarioService.
   */
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  /**
   * Obtiene a todos los administradores registrados en el sistema.
   *
   * @return array|false Un array de objetos Persona que representan a los administradores, o false si no se encuentran administradores.
   */
  public function getAdministradores()
  {
    // Obtiene una lista de usuarios con el tipo "ADMINISTRADOR".
    $usuarioAdmins = $this->usuarioService->getUsuariosByTipo("ADMINISTRADOR");
    $admins = [];

    if ($usuarioAdmins) {
      // Itera sobre los usuarios administradores y obtiene la información de la persona asociada a cada uno.
      foreach ($usuarioAdmins as $usuarioAdmin) {
        $admin = $this->usuarioService->getPersonaByUsuarioId($usuarioAdmin->getId());
        $admin->setUsuario($usuarioAdmin);
        $admins[] = $admin;
      }
    } else {
      // No se encontraron administradores.
      return false;
    }

    // Retorna un array de objetos Persona que representan a los administradores.
    return $admins;
  }
}


?>
<?php

/**
 * La clase AuthService se utiliza para la autenticación de usuarios.
 */
class AuthService
{
  private $usuarioService;

  /**
   * Constructor de la clase AuthService. Inicializa una instancia de UsuarioService.
   */
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  /**
   * Intenta autenticar a un usuario comparando el nombre de usuario y contraseña proporcionados.
   *
   * @param string $username El nombre de usuario.
   * @param string $password La contraseña proporcionada.
   *
   * @return bool Devuelve true si la autenticación es exitosa, de lo contrario, devuelve false.
   */
  public function login($username, $password)
  {
    // Obtiene el usuario correspondiente al nombre de usuario proporcionado.
    $usuario = $this->usuarioService->getUsuarioByUsername($username);

    // Comprueba si se encontró un usuario y verifica si la contraseña coincide.
    if ($usuario !== null && password_verify($password, $usuario->getPassword())) {
      return true; // Autenticación exitosa.
    }

    return false; // Autenticación fallida.
  }
}

?>
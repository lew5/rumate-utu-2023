<?php

/**
 * Controlador para la autenticación de usuarios.
 */
class AuthController
{
  /**
   * @var AuthService Instancia de la clase AuthService utilizada para autenticar usuarios.
   */
  private $authService;

  /**
   * @var UsuarioService Instancia de la clase UsuarioService utilizada para gestionar usuarios.
   */
  private $usuarioService;

  /**
   * Constructor de la clase AuthController.
   * Inicializa las instancias de AuthService y UsuarioService.
   */
  public function __construct()
  {
    $this->authService = Container::resolve(AuthService::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  /**
   * Maneja el proceso de inicio de sesión.
   * Comprueba las credenciales del usuario y gestiona la sesión.
   *
   * @return void
   */
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $usuarioValidado = $this->authService->login($username, $password);
      if ($usuarioValidado !== false) {
        $this->iniciarSession($username);
      } else {
        $this->errorSession($username);
      }
    }
  }

  /**
   * Cierra la sesión actual del usuario y redirige.
   *
   * @return void
   */
  public static function logout()
  {
    session_destroy();
    route::redirect();
  }

  /**
   * Inicia una sesión para el usuario autenticado.
   * Almacena información en la variable de sesión $_SESSION['usuario'] y redirige al usuario.
   *
   * @param string $username El nombre de usuario del usuario autenticado.
   * @return void
   */
  private function iniciarSession($username)
  {
    $usuario = $this->usuarioService->getUsuarioByUsername($username);
    if ($usuario->getTipo() == "ADMINISTRADOR" || $usuario->getTipo() == "ROOT") {
      $usuario = serialize($usuario);
      $_SESSION['usuario'] = $usuario;
      route::redirect("/");
    } else {
      $usuario = serialize($usuario);
      $_SESSION['usuario'] = $usuario;
      route::redirect();
    }
  }

  /**
   * Maneja sesiones de error.
   * Almacena un mensaje de error y el nombre de usuario proporcionado en la variable $_SESSION['loginError'].
   *
   * @param string $username El nombre de usuario que no pudo autenticarse.
   * @return void
   */
  private function errorSession($username)
  {
    $_SESSION['loginError'] = [
      'error' => "Usuario o contraseña incorrectos.",
      'username' => $username
    ];
    route::redirect("/login");
  }
}

?>
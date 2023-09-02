<?php
/**
 * AuthController: Controlador para manejar la autenticación de usuarios.
 */
class AuthController
{
  /**
   * @var AuthService $authService Instancia del servicio de autenticación.
   */
  protected $authService;

  /**
   * Constructor de AuthController.
   *
   * @param AuthService $authService El servicio de autenticación a utilizar.
   */
  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  /**
   * Maneja el proceso de inicio de sesión.
   */
  public function login()
  {
    // Verificar si se envió el formulario de inicio de sesión.
    if (isset($_POST['login-btn'])) {
      // Obtener y limpiar los valores del formulario.
      $username = isset($_POST['username']) ? trim($_POST['username']) : "";
      $password = isset($_POST['password']) ? $_POST['password'] : "";

      // Intentar autenticar al usuario utilizando el servicio de autenticación.
      $user = $this->authService->authenticate($username, $password);
      // vd($user);
      unset($_POST);

      // Si la autenticación es exitosa, establecer las variables de sesión y redirigir.
      if ($user) {
        $_SESSION['usuario'] = [
          'username' => $user->getUsername(),
          'estado' => $user->getEstadoClienteProveedor()
        ];
        header("Location: /");
        exit();
      } else {
        // Si la autenticación falla, mostrar un mensaje de error en la vista de inicio de sesión.
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        $_SESSION['login_username'] = $username;
        header("Location: /login");
        exit();
      }
    } else {
      // Mostrar la vista de inicio de sesión sin errores.
      view("login/index.view.php", [
        'title' => "Rumate - Login",
      ]);
    }
  }
}
?>
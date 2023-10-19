<?php
class RegistroController
{
  private $registroService;

  public function __construct()
  {
    $this->registroService = Container::resolve(RegistroService::class);
  }
  public function index()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $postData = $_POST;
      $persona = $this->postToPersona($postData);
      $personaRegistrada = $this->registrarPersona($persona);
      if ($personaRegistrada) {
        $this->iniciarSession($username);
      } else {
        $this->errorSession($username);
      }
    } else {
      // Mostrar el formulario de registro
      Middleware::resolve("invitado");
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - registro");
      $view->assign("h1", "Registro");
      $view->assign("p", "Regístrate para poder participar en los remates.");
      $view->render(BASE_PATH . "/Resources/Views/Registro/registro.view.php");
    }
  }

  private function iniciarSession($username)
  {
    route::redirect("/login");
  }

  private function errorSession($username)
  {
    // Implementación de manejo de error de inicio de sesión
  }

  private function postToPersona($postData)
  {
    $persona = Container::resolve(Persona::class);
    $persona->setNombre($_POST['nombre']);
    $persona->setApellido($_POST['apellido']);
    $persona->setCi($_POST['ci']);
    $persona->setBarrio($_POST['barrio']);
    $persona->setCalle($_POST['calle']);
    $persona->setNumero($_POST['numero']);
    $persona->setTelefono($_POST['telefono']);
    $usuario = Container::resolve(Usuario::class);
    $usuario->setUsername($_POST['username']);
    $usuario->setPassword($_POST['password']);
    $usuario->setEmail($_POST['email']);
    $persona->setUsuario($usuario);
    return $persona;
  }

  private function registrarPersona($persona)
  {
    return $this->registroService->createUsuarioAndPersona($persona);
  }
}


?>
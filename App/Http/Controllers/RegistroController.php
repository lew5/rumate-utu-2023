<?php
/**
 * Controlador para las acciones relacionadas con el registro de usuarios.
 */
class RegistroController
{
  /**
   * @var RegistroService Servicio de registro.
   */
  private $registroService;
  /**
   * Constructor de la clase.
   */
  public function __construct()
  {
    Middleware::usuario("/");
    $this->registroService = Container::resolve(RegistroService::class);
  }
  /**
   * Muestra el formulario de registro o procesa los datos de registro.
   * 
   * @return void
   */
  public function index()
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $postData = $_POST;
      $persona = $this->postToPersona($postData);
      $personaRegistrada = $this->registrarPersona($persona);
      if ($personaRegistrada) {
        $this->iniciarSession();
      } else {
        $this->errorRegistro();
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
  /**
   * Inicia la sesión y redirige al usuario a la página de inicio de sesión.
   * 
   * @return void
   */
  private function iniciarSession()
  {
    route::redirect("/login");
  }
  /**
   * Muestra un error de registro y aborta la aplicación.
   * 
   * @return void
   */
  private function errorRegistro()
  {
    abort(500);
  }

  /**
   * Convierte los datos POST en un objeto de tipo Persona.
   * 
   * @param array $postData Los datos POST recibidos.
   * 
   * @return Persona El objeto Persona creado a partir de los datos POST.
   */
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
  /**
   * Registra una persona y un usuario.
   * 
   * @param Persona $persona El objeto Persona a registrar.
   * 
   * @return bool true si el registro se realizó con éxito, de lo contrario, false.
   */
  private function registrarPersona($persona)
  {
    return $this->registroService->createUsuarioAndPersona($persona);
  }
}


?>
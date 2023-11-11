<?php
/**
 * Controlador para las acciones relacionadas con los usuarios y perfiles.
 */
class UsuarioController
{
  /** @var UsuarioService Servicio de usuario para gestionar la lógica de usuario. */
  private $usuarioService;

  /**
   * Constructor de la clase UsuarioController.
   */
  public function __construct()
  {
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }

  /**
   * Muestra el perfil de un usuario.
   * 
   * @param int $id Identificador del usuario.
   * @return void
   */
  public function verPerfil($id)
  {
    $usuario = $this->usuarioService->getUsuarioById($id);
    if ($usuario) {
      Middleware::verPerfil($id);
      $idUsuario = $usuario->getId();
      $persona = $this->usuarioService->getPersonaByUsuarioId($idUsuario);
      $username = $usuario->getUsername();
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Perfil");
      $view->assign("header_title", "Perfil de <span>$username</span>");
      $view->assign("persona", $persona);
      $view->assign("usuario", $usuario);
      $view->render(BASE_PATH . "/Resources/Views/Usuario/editar-usuario.php");
    } else {
      abort();
    }
  }

  /**
   * Actualiza el perfil de un usuario.
   * 
   * @param int $id Identificador del usuario.
   * @return void
   */
  public function actualizarPerfil($id)
  {
    Middleware::verPerfil($id);
    $usuarioConPersona = $_POST['usuarioConPersona'];
    if (isset($usuarioConPersona['usuario']['password_usuario']) && !empty($usuarioConPersona['usuario']['password_usuario'])) {
      $usuarioConPersona['usuario']['password_usuario'] = PasswordHash::hashPassword($usuarioConPersona['usuario']['password_usuario']);
    } else {
      unset($usuarioConPersona['usuario']['password_usuario']);
    }
    $usuario = $this->usuarioService->updateUsuario($id, $usuarioConPersona);
    if ($usuario == false) {
      $respuesta = ['mensaje' => 'Ese nombre de usuario no está disponible.'];
    } else if ($usuario == null) {
      $respuesta = ['mensaje' => 'No se pudo actualizar el usuario.'];
    } else {
      if ($usuario->getId() == sessionUsuario()->getId()) {
        $usuario = serialize($usuario);
        $_SESSION['usuario'] = $usuario;
      }
      $respuesta = ['mensaje' => 'Usuario actualizado correctamente.'];
    }
    $respuesta = json_encode($respuesta);
    echo $respuesta;
    die;
  }

  /**
   * Elimina un usuario.
   * 
   * @param int $id Identificador del usuario a eliminar.
   * @return void
   */
  public function eliminarUsuario($id)
  {
    Middleware::admin();
    if ($this->usuarioService->deleteUsuario($id)) {
      $respuesta = ['mensaje' => 'Usuario eliminado correctamente.'];
    } else {
      $respuesta = ['mensaje' => 'No se pudo eliminar el usuario.'];
    }
    $respuesta = json_encode($respuesta);
    echo $respuesta;
    die;
  }
}

?>
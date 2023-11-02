<?php

class RootController
{
  public function listarAdministradores()
  {
    Middleware::root();
    $AdminService = Container::resolve(AdminService::class);
    $administradores = $AdminService->getAdministradores();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Empleados");
    $view->assign("header_title", "Empleados");
    $view->assign("administradores", $administradores);
    $view->render(BASE_PATH . "/Resources/Views/Administrador/admin.view.php");
  }

  public function crearAdministrador()
  {
    Middleware::root();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Empleados");
    $view->assign("header_title", "Crear empleado");
    $view->render(BASE_PATH . "/Resources/Views/Root/crear-admin.php");
  }

  public function crearAdministradorPost()
  {
    Middleware::root();
    $registroService = Container::resolve(RegistroService::class);
    if ($registroService->createUsuarioAndPersona($this->postToPersona())) {
      $respuesta = ['mensaje' => 'Empleado registrado correctamente.'];
    } else {
      $respuesta = ['mensaje' => 'Error al registrar empleado.'];
    }
    $respuesta = json_encode($respuesta);
    echo $respuesta;
    die;
  }

  private function postToPersona()
  {
    $personaData = $_POST['persona'];
    $persona = Container::resolve(Persona::class);
    $persona->setNombre($personaData['nombre_persona']);
    $persona->setApellido($personaData['apellido_persona']);
    $persona->setCi($personaData['ci_persona']);
    $persona->setBarrio($personaData['barrio_persona']);
    $persona->setCalle($personaData['calle_persona']);
    $persona->setNumero($personaData['numero_persona']);
    $persona->setTelefono($personaData['telefono_persona']);
    $usuarioData = $_POST['usuario'];
    $usuario = Container::resolve(Usuario::class);
    $usuario->setUsername($usuarioData['username_usuario']);
    $usuario->setPassword($usuarioData['password_usuario']);
    $usuario->setEmail($usuarioData['email_usuario']);
    $usuario->setTipo($usuarioData['tipo_usuario']);
    $persona->setUsuario($usuario);
    return $persona;
  }
}

?>
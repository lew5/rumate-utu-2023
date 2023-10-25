<?php

class UsuarioController
{
  public function __construct()
  {
  }
  public function verPerfil($username)
  {
    $usuarioService = Container::resolve(UsuarioService::class);
    if ($usuarioService->getUsuarioByUsername($username)) {
      Middleware::verPerfil($username);
      $usuario = $usuarioService->getUsuarioByUsername($username);
      $idUsuario = $usuario->getId();
      $personaDeUsuario = $usuarioService->getPersonaByUsuarioId($idUsuario);
      $username = $usuario->getUsername();
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Perfil");
      $view->assign("header_title", "Perfil de <span>$username</span>");
      $view->assign("personaDeUsuario", $personaDeUsuario);
      $view->assign("usuarioA", $usuario);
      $view->render(BASE_PATH . "/Resources/Views/Usuario/editar-usuario.php");
    } else {
      abort();
    }
  }

  public function actualizarPerfil($username)
  {

    $usuarioService = Container::resolve(UsuarioService::class);
    $personaService = Container::resolve(PersonaService::class);

    if ($usuarioService->getUsuarioByUsername($username)) {
      $usuarioData = $_POST['usuario'];
      $personaData = $_POST['persona'];
      Middleware::verPerfil($username);
      $idUsuario = sessionUsuario()->getId();
      $personaDeUsuario = $usuarioService->getPersonaByUsuarioId($idUsuario);
      $idPersona = $personaDeUsuario->getId();
      $usuarioService->updateUsuario($idUsuario, $usuarioData);
      $personaService->updatePersona($idPersona, $personaData);
      $usuario = $usuarioService->getUsuarioById($idUsuario);
      $username = $usuario->getUsername();
      $usuario = serialize($usuario);
      $_SESSION['usuario'] = $usuario;
      Route::redirect("/perfil/$username");
      die;

      // $personaDeUsuario = $usuarioService->getPersonaByUsuarioId($idUsuario);
      // $usuario = sessionUsuario();
      // $view = Container::resolve(View::class);
      // $view->assign("title", "Rumate - Perfil");
      // $view->assign("header_title", "Perfil de <span>$username</span>");
      // $view->assign("personaDeUsuario", $personaDeUsuario);
      // $view->assign("usuario", $usuario);
      // $view->render(BASE_PATH . "/Resources/Views/Usuario/editar-usuario.php");
    } else {
      abort();
    }
  }
}

?>
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
      if (Middleware::admin() || sessionUsuario()->getUsername() == $username) {
        $idUsuario = sessionUsuario()->getId();
        $personaDeUsuario = $usuarioService->getPersonaByUsuarioId($idUsuario);
        $usuario = sessionUsuario();
        $view = Container::resolve(View::class);
        $view->assign("title", "Rumate - Perfil");
        $view->assign("header_title", "Perfil de <span>$username</span>");
        $view->assign("personaDeUsuario", $personaDeUsuario);
        $view->assign("usuario", $usuario);
        $view->render(BASE_PATH . "/Resources/Views/Usuario/editar-usuario.php");
      }
    } else {
      abort();
    }


  }
}

?>
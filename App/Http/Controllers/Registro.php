<?php

class Registro
{
  public function index()
  {
    Middleware::resolve("invitado");
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - registro");
    $view->assign("h1", "Registro");
    $view->assign("p", "Regístrate para poder participar en los remates.");
    $view->render(BASE_PATH . "/Resources/Views/registro.view.php");
  }
}

?>
<?php

class AdministradorController
{
  public function __construct()
  {

  }
  public function index()
  {
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Panel de control");
    $view->assign("header_title", "Crear nuevo remate");
    $view->render(BASE_PATH . "/Resources/Views/Remate/crear-remate.php");
  }

  public function registrarRemate()
  {
    $remateRepository = Container::resolve(RemateRepository::class);
    $remate = Container::resolve(Remate::class);
    $remate = [];
    $remate['titulo_remate'] = $_POST['titulo_remate'];
    $remate['imagen_remate'] = Container::resolve(GuardarImagen::class)->guardarImagen($_FILES['imagen_remate']);
    $remate['fecha_inicio_remate'] = $_POST['fecha_inicio_remate'];
    $remate['fecha_final_remate'] = $_POST['fecha_final_remate'];
    $remateRepository->addRemate($remate);
  }


}

?>
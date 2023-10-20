<?php

class AdministradorController
{

  private $categoriaRepository;

  private $usuarioService;
  public function __construct()
  {
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
  }
  public function index()
  {
    $categorias = $this->categoriaRepository->find();
    $proveedores[] = $this->usuarioService->getUsuarioByTipo("PROVEEDOR");
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Panel de control");
    $view->assign("header_title", "Crear nuevo remate");
    $view->assign("categorias", $categorias);
    $view->assign("proveedores", $proveedores);
    $view->render(BASE_PATH . "/Resources/Views/Remate/crear-remate.php");
  }

  public function registrarRemate()
  {
    var_dump($_POST);
    // $remateRepository = Container::resolve(RemateRepository::class);
    // $remate = Container::resolve(Remate::class);
    // $remate = [];
    // $remate['titulo_remate'] = $_POST['titulo_remate'];
    // $remate['imagen_remate'] = Container::resolve(GuardarImagen::class)->guardarImagen($_FILES['imagen_remate']);
    // $remate['fecha_inicio_remate'] = $_POST['fecha_inicio_remate'];
    // $remate['fecha_final_remate'] = $_POST['fecha_final_remate'];
    // $remateRepository->addRemate($remate);
  }


}

?>
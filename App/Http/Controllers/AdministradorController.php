<?php

class AdministradorController
{

  private $categoriaRepository;
  private $remateService;
  private $usuarioService;
  public function __construct()
  {
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
    $this->remateService = Container::resolve(RemateService::class);
  }
  public function index()
  {
    $categorias = $this->categoriaRepository->find();
    $proveedores = $this->usuarioService->getUsuariosByTipo("PROVEEDOR");
    // var_dump($proveedores);
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Panel de control");
    $view->assign("header_title", "Crear nuevo remate");
    $view->assign("categorias", $categorias);
    $view->assign("proveedores", $proveedores);
    $view->render(BASE_PATH . "/Resources/Views/Remate/crear-remate.php");
  }

  public function registrarRemate()
  {
    // var_dump($_POST);
    $remate = Container::resolve(Remate::class);
    $remate->setTitulo($_POST['titulo_remate']);
    $remate->setImagen($_POST['imagen_remate']);
    $remate->setFechaInicio($_POST['fecha_inicio_remate']);
    $remate->setFechaFinal($_POST['fecha_final_remate']);

    $lote = Container::resolve(Lote::class);
    $lote->setImagen($_POST['imagen_lote']);
    $lote->setPrecioBase($_POST['precio_base_lote']);
    $lote->setIdProveedor($_POST['id_proveedor_lote']);
    $lote->setIdCategoria($_POST['id_categoria_lote']);

    $ficha = Container::resolve(Ficha::class);
    $ficha->setPeso($_POST['peso_ficha']);
    $ficha->setCantidad($_POST['cantidad_ficha']);
    $ficha->setRaza($_POST['raza_ficha']);
    $ficha->setDescripcion($_POST['descripcion_ficha']);

    $lote->setFicha($ficha);

    $arrayLotes[] = $lote;

    $remate->setLotes($arrayLotes);

    var_dump($remate);
    die;

    // var_dump($remate->getLotes()[0]->getFicha());
    // // // $remate = serialize($remate);
    // // // $_SESSION['remate'] = $remate;
    // // // var_dump(unserialize($_SESSION['remate']));
    // die;
    $this->remateService->createRemate($remate);
  }


}

?>
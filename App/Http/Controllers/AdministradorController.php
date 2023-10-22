<?php

class AdministradorController
{

  private $categoriaRepository;
  private $remateService;
  private $usuarioService;
  public function __construct()
  {
    Middleware::admin();
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
    $this->remateService = Container::resolve(RemateService::class);
  }

  public function crearRemate()
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
    $remateData = json_decode($_POST['remate-data']);
    var_dump($_FILES);
    $remate = Container::resolve(Remate::class);
    $remate->setTitulo($remateData->titulo_remate);
    $remate->setImagen($remateData->imagen_remate);
    $remate->setFechaInicio($remateData->fecha_inicio_remate);
    $remate->setFechaFinal($remateData->fecha_final_remate);
    $lotes = [];
    foreach ($remateData->lotes as $loteData) {
      $lote = Container::resolve(Lote::class);
      // $lote->setImagen($loteData->imagen_lote);
      $lote->setPrecioBase($loteData->precio_base_lote);
      $lote->setIdProveedor($loteData->proveedor);
      $lote->setIdCategoria($loteData->categoria);
      $ficha = Container::resolve(Ficha::class);
      $ficha->setPeso($loteData->ficha->peso_ficha);
      $ficha->setCantidad($loteData->ficha->cantidad_ficha);
      $ficha->setRaza($loteData->ficha->raza_ficha);
      $ficha->setDescripcion($loteData->ficha->descripcion_ficha);
      $lote->setFicha($ficha);
      $lotes[] = $lote;
    }
    $remate->setLotes($lotes);
    var_dump($remate);
    // die;
    // // // $remate = serialize($remate);
    // // // $_SESSION['remate'] = $remate;
    // // // var_dump(unserialize($_SESSION['remate']));
    // die;
    // $this->remateService->createRemate($remate);
  }

  public function editarRemate($idRemate)
  {
    $lotes = Container::resolve(RemateService::class)->getLotes($idRemate);
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Editar remate");
    $view->assign("header_title", "Editar remate <span>#$idRemate</span>");
    $view->assign("lotes", $lotes);
    $view->render(BASE_PATH . "/Resources/Views/Remate/editar-remate.php");
  }

  public function editarLote($idLote)
  {
    $lote = Container::resolve(LoteService::class)->getLoteById($idLote);
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Editar lote");
    $view->assign("header_title", "Editar lote <span>#$idLote</span>");
    $view->assign("lotes", $lote);
    $view->render(BASE_PATH . "/Resources/Views/Lote/editar-lote.php");
  }

}

?>
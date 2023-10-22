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
    $remate = Container::resolve(Remate::class);
    $remate->setTitulo($remateData->titulo_remate);
    $remate->setImagen($remateData->imagen_remate);
    $remate->setFechaInicio($remateData->fecha_inicio_remate);
    $remate->setFechaFinal($remateData->fecha_final_remate);
    $lotes = [];
    foreach ($remateData->lotes as $loteData) {
      $lote = Container::resolve(Lote::class);
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
    $this->remateService->createRemate($remate);
  }

  public function editarRemate($idRemate)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $remateActualizado = $_POST;
      if ($this->remateService->updateRemate($idRemate, $remateActualizado)) {
        http_response_code(200);
        $respuesta = ['mensaje' => 'Remate actualizado correctamente'];
      } else {
        http_response_code(400);
        $respuesta = ['mensaje' => 'Error al actualizar el remate'];
      }
      header('Content-Type: application/json');
      $respuesta = json_encode($respuesta);
      echo $respuesta;
      die;
    } else {
      $remate = Container::resolve(RemateService::class)->getRemateById($idRemate);
      if ($remate->getLotes()) {
        $view = Container::resolve(View::class);
        $view->assign("title", "Rumate - Editar remate");
        $view->assign("header_title", "Editar remate <span>#$idRemate</span>");
        $view->assign("remate", $remate);
        $view->render(BASE_PATH . "/Resources/Views/Remate/editar-remate.php");
      } else {
        abort(404);
      }
    }
  }

  public function eliminarRemate($idRemate)
  {
    if ($this->remateService->deleteRemate($idRemate)) {
      http_response_code(200);
      $respuesta = ['mensaje' => 'Remate eliminado correctamente'];
    } else {
      http_response_code(400);
      $respuesta = ['mensaje' => 'Error al eliminar el remate'];
    }
    header('Content-Type: application/json');
    $respuesta = json_encode($respuesta);
    echo $respuesta;
  }

  public function editarLote($idLote)
  {
    $categorias = $this->categoriaRepository->find();
    $proveedores = $this->usuarioService->getUsuariosByTipo("PROVEEDOR");
    $lote = Container::resolve(LoteService::class)->getLoteById($idLote);
    if ($lote) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Editar lote");
      $view->assign("header_title", "Editar lote <span>#$idLote</span>");
      $view->assign("lote", $lote);
      $view->assign("categorias", $categorias);
      $view->assign("proveedores", $proveedores);
      $view->render(BASE_PATH . "/Resources/Views/Lote/editar-lote.php");
    } else {
      abort(404);
    }

  }

}

?>
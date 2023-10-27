<?php

class AdministradorController
{

  private $categoriaRepository;
  private $remateService;
  private $usuarioService;

  private $personaService;
  public function __construct()
  {
    Middleware::admin();
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
    $this->remateService = Container::resolve(RemateService::class);
    $this->personaService = Container::resolve(PersonaService::class);
  }

  public function crearRemate()
  {
    $categorias = $this->categoriaRepository->find();
    $proveedores = $this->personaService->getPersonasConTipoProveedor();
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - Crear remate");
    $view->assign("header_title", "Crear nuevo remate");
    $view->assign("categorias", $categorias);
    $view->assign("proveedores", $proveedores);
    $view->render(BASE_PATH . "/Resources/Views/Remate/crear-remate.php");
  }

  public function registrarRemate()
  {
    $remateData = json_decode($_POST['remate-data']);
    $remate = Container::resolve(Remate::class);
    $imgNombre = false;
    if ($_FILES['imagen_remate']['name'] != '') {
      $imgFile = $_FILES['imagen_remate'];
      $imgNombre = Imagen::generarNombre($imgFile);
      $remate->setImagen($imgNombre);
    } else {
      $remate->setImagen("No imagen");
    }
    $remate->setTitulo($remateData->titulo_remate);
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
    if ($this->remateService->createRemate($remate)) {
      if ($imgNombre) {
        Imagen::guardarImagen($imgFile, $imgNombre, "Remate");
      }
    } else {
      abort(500);
    }
    Route::redirect();
  }

  public function editarRemate($idRemate)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $remateActualizado = $_POST;
      $imgNombre = false;
      if ($_FILES['imagen_remate']['name'] != '') {
        $imgFile = $_FILES['imagen_remate'];
        $imgNombre = Imagen::generarNombre($imgFile);
        $remateActualizado['imagen_remate'] = $imgNombre;
      }
      if ($this->remateService->updateRemate($idRemate, $remateActualizado)) {
        if ($imgNombre) {
          Imagen::guardarImagen($imgFile, $imgNombre, "Remate");
        }
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $loteActualizado = $_POST['loteConFicha'];
      $imgNombre = false;
      if ($_FILES['imagen_lote']['name'] != '') {
        $imgFile = $_FILES['imagen_lote'];
        $imgNombre = Imagen::generarNombre($imgFile);
        $loteActualizado['lote']['imagen_lote'] = $imgNombre;
      }
      $loteService = Container::resolve(LoteService::class);
      if ($loteService->updateLote($idLote, $loteActualizado)) {
        if ($imgNombre) {
          Imagen::guardarImagen($imgFile, $imgNombre, "Lote");
        }
        http_response_code(200);
        $respuesta = ['mensaje' => 'Lote actualizado correctamente'];
      } else {
        http_response_code(400);
        $respuesta = ['mensaje' => 'Error al actualizar el lote'];
      }
      header('Content-Type: application/json');
      $respuesta = json_encode($respuesta);
      echo $respuesta;
    } else {
      $categorias = $this->categoriaRepository->find();
      $proveedores = $this->personaService->getPersonasConTipoProveedor();
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

  public function eliminarLote($idLote)
  {
    $loteService = Container::resolve(LoteService::class);
    if ($loteService->deleteLote($idLote)) {
      http_response_code(200);
      $respuesta = ['mensaje' => 'Lote eliminado correctamente'];
    } else {
      http_response_code(400);
      $respuesta = ['mensaje' => 'Error al eliminar el lote. No puedes eliminar un lote que contenga pujas'];
    }
    header('Content-Type: application/json');
    $respuesta = json_encode($respuesta);
    echo $respuesta;
  }

}

?>
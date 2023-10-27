<?php

class LoteController
{
  public static function index($idRemate, $idLote)
  {
    $lote = Container::resolve(LoteService::class)->getLoteById($idLote);
    if ($lote != false) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Lote");
      $view->assign("header_title", "Lote <span>#$idRemate</span>");
      $view->assign("lote", $lote);
      $view->render(BASE_PATH . "/Resources/Views/Lote/lote.view.php");
    } else {
      abort();
    }
  }

  public function crearLote($idRemate)
  {
    Middleware::admin();
    if (Container::resolve(RemateService::class)->getRemateById($idRemate)) {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lotesData = json_decode($_POST['lote-data']);
        $lotes = [];
        foreach ($lotesData as $loteData) {
          $lote = Container::resolve(Lote::class);
          $lote->setImagen($loteData->imagen_lote);
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
        $remateService = Container::resolve(RemateService::class);
        try {
          $remateService->insertLotesByRemate($lotes, $idRemate);
          Route::redirect("/admin/remate/editar/$idRemate");
        } catch (PDOException $e) {
          var_dump($e->errorInfo);
          abort(500);
        }
      } else {
        $categoriaRepository = Container::resolve(CategoriaRepository::class);
        $personaService = Container::resolve(PersonaService::class);

        $categorias = $categoriaRepository->find();
        $proveedores = $personaService->getPersonasConTipoProveedor();

        $view = Container::resolve(View::class);
        $view->assign("title", "Rumate - Crear lote");
        $view->assign("header_title", "Crear nuevo lote para el remate <span>#$idRemate</span>");
        $view->assign("categorias", $categorias);
        $view->assign("proveedores", $proveedores);
        $view->assign("idRemate", $idRemate);
        $view->render(BASE_PATH . "/Resources/Views/Lote/crear-lote.php");
      }
    } else {
      abort();
    }

  }

  public static function listarLotes($idRemate)
  {
    $remate = Container::resolve(RemateService::class)->getRemateById($idRemate);
    foreach ($remate->getLotes() as $lote) {
      $proveedor = Container::resolve(UsuarioService::class)->getUsuarioByPersonaId($lote->getIdProveedor());
      $lote->setProveedor($proveedor);
    }
    if ($remate != false) {
      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Remate");
      $view->assign("header_title", "Lotes del remate  <span>#$idRemate</span>");
      $view->assign("remate", $remate);
      $view->render(BASE_PATH . "/Resources/Views/Remate/remate.view.php");
    } else {
      // abort();
    }
  }

}

?>
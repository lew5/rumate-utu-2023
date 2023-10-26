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
        $remateData = json_decode($_POST['lote-data']);
        var_dump($remateData);
        die;
      } else {
        # code...
      }
      $categoriaRepository = Container::resolve(CategoriaRepository::class);
      $usuarioService = Container::resolve(UsuarioService::class);

      $categorias = $categoriaRepository->find();
      $proveedores = $usuarioService->getUsuariosByTipo("PROVEEDOR");

      $view = Container::resolve(View::class);
      $view->assign("title", "Rumate - Crear lote");
      $view->assign("header_title", "Crear nuevo lote para el remate <span>#$idRemate</span>");
      $view->assign("categorias", $categorias);
      $view->assign("proveedores", $proveedores);
      $view->assign("idRemate", $idRemate);
      $view->render(BASE_PATH . "/Resources/Views/Lote/crear-lote.php");
    } else {
      abort();
    }

  }

  public static function listarLotes($idRemate)
  {
    $remate = Container::resolve(RemateService::class)->getRemateById($idRemate);
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
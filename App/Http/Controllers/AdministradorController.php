<?php
/**
 * Controlador para las acciones de administrador.
 */
class AdministradorController
{

  /**
   * @var CategoriaRepository Instancia de la clase CategoriaRepository utilizada para gestionar categorías.
   */
  private $categoriaRepository;

  /**
   * @var RemateService Instancia de la clase RemateService utilizada para gestionar remates.
   */
  private $remateService;

  /**
   * @var UsuarioService Instancia de la clase UsuarioService utilizada para gestionar usuarios.
   */
  private $usuarioService;

  /**
   * @var PersonaService Instancia de la clase PersonaService utilizada para gestionar personas.
   */
  private $personaService;

  /**
   * Constructor de la clase AdministradorController.
   * Inicializa las instancias de CategoriaRepository, UsuarioService, RemateService y PersonaService.
   * Aplica el middleware de administrador para garantizar el acceso.
   */
  public function __construct()
  {
    Middleware::admin();
    $this->categoriaRepository = Container::resolve(CategoriaRepository::class);
    $this->usuarioService = Container::resolve(UsuarioService::class);
    $this->remateService = Container::resolve(RemateService::class);
    $this->personaService = Container::resolve(PersonaService::class);
  }
  /**
   * Muestra la vista para crear un nuevo remate.
   * Carga las categorías y proveedores disponibles para el nuevo remate.
   *
   * @return void
   */
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
  /**
   * Registra un nuevo remate en la base de datos.
   * Procesa los datos del remate, crea lotes y almacena la información.
   *
   * @return void
   */
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
  /**
   * Muestra la vista para editar un remate existente.
   * Permite la edición de información del remate y sus lotes.
   *
   * @param int $idRemate ID del remate a editar.
   * @return void
   */
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
      foreach ($remate->getLotes() as $lote) {
        $proveedor = Container::resolve(UsuarioService::class)->getUsuarioByPersonaId($lote->getIdProveedor());
        $lote->setProveedor($proveedor);
      }
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
  /**
   * Elimina un remate existente de la base de datos.
   *
   * @param int $idRemate ID del remate a eliminar.
   * @return void
   */
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
  /**
   * Muestra la vista para editar un lote existente.
   * Permite la edición de información del lote.
   *
   * @param int $idLote ID del lote a editar.
   * @return void
   */
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
  /**
   * Elimina un lote existente de la base de datos.
   *
   * @param int $idLote ID del lote a eliminar.
   * @return void
   */
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
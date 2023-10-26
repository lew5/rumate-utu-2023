<div class="card-container f-column">
  <?php
  if ($clientes != false) {
    foreach ($clientes as $cliente) {
      $imagen_nombre = $cliente->getUsuario()->getImagen();
      if (!empty($imagen_nombre) && file_exists(BASE_PATH . "/Public/imgs/Usuario/" . $imagen_nombre)) {
        $imagen_path = PUBLIC_PATH . "/Public/imgs/Usuario/" . $imagen_nombre;
      } else {
        $imagen_path = PUBLIC_PATH . "/Public/imgs/Usuario/cliente-no-image.webp";
      }
      $cliente->getUsuario()->setImagen($imagen_path);
      $view = Container::resolve(View::class);
      $view->assign("cliente", $cliente);
      $view->render(BASE_PATH . "/Resources/Views/Cliente/card-cliente.php");
    }
  } else {
    // abort(500); //no se encontraron clientes
  }
  ?>
</div>
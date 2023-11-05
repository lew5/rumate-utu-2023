<div class="card-container f-column">
  <?php
  if ($administradores != false) {
    foreach ($administradores as $administrador) {
      $imagen_nombre = $administrador->getUsuario()->getImagen();
      if (!empty($imagen_nombre) && file_exists(BASE_PATH . "/Public/imgs/Usuario/" . $imagen_nombre . ".webp")) {
        $imagen_path = PUBLIC_PATH . "/Public/imgs/Usuario/" . $imagen_nombre . ".webp";
      } else {
        $imagen_path = PUBLIC_PATH . "/Public/imgs/Usuario/15.webp";
      }
      $administrador->getUsuario()->setImagen($imagen_path);
      $view = Container::resolve(View::class);
      $view->assign("administrador", $administrador);
      $view->render(BASE_PATH . "/Resources/Views/Administrador/card-admin.php");
    }
  } else {
    // abort(500); //no se encontraron proveedores
  }
  ?>
</div>
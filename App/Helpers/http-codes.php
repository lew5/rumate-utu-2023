<?php

/**
 * Muestra una página de error personalizada y establece el código de respuesta HTTP.
 *
 * @param int $code El código de respuesta HTTP a establecer (por defecto, 404).
 */
function abort($code = 404)
{
  // Establece el código de respuesta HTTP.
  http_response_code($code);

  // Crea una instancia de la clase View usando el contenedor de dependencias (Container).
  $view = Container::resolve(View::class);

  // Asigna el título y el encabezado de la página de error.
  $view->assign("title", "Rumate - $code");
  $view->assign("h1", $code);

  // Renderiza la vista de error correspondiente al código proporcionado.
  $view->render(BASE_PATH . "/Resources/Views/Errores/$code.php");

  // Termina la ejecución del script.
  die();
}

?>
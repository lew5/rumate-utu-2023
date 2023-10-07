<?php

function abort($code = 404)
  {
    http_response_code($code);
    $view = Container::resolve(View::class);
    $view->assign("title", "Rumate - $code");
    $view->assign("h1", $code);
    $view->render(BASE_PATH . "/Resources/Views/$code.php");
    die();
  }

?>
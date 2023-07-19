<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$query = parse_url($_SERVER['REQUEST_URI'])['query']; //separar el query en un array bla bla

$routes = [

  "/" => "app/controllers/index.php",

];

function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {

    require($routes[$uri]);

  } else {

    abort();

  }

}

function abort($code = 404)
{

  http_response_code($code);
  // require("app/views/{$code}.php");
  die();

}

routeToController($uri, $routes);

?>
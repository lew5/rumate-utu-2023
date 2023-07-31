<?php

$router->get("/", view_path("home/index.view.php"));
$router->get("/login", controller_path("/login/index.php"));
$router->get("/registro", controller_path("register/index.php"))->only("guest");

?>
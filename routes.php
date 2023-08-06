<?php

$router->get("/", controller_path("home/index.php"));
$router->get("/login", controller_path("login/index.php"));
$router->get("/registro", controller_path("register/index.php"))->only("guest");

?>
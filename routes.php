<?php

$router->get("/", controller_path("home/index.php"));
$router->get("/login", controller_path("login/index.php"))->only("guest");
$router->get("/registro", controller_path("register/index.php"))->only("guest");



//pruebas
$router->get("/api/v1/remates", base_path("api/remate/read.php"));
$router->post("/api/v1/remates", base_path("api/remate/create.php")); //only auth
$router->put("/api/v1/remates", base_path("api/remate/update.php")); //only auth
$router->delete("/api/v1/remates", base_path("api/remate/delete.php")); //only auth
//
//pruebas
$router->get("/api/v1/empleados", base_path("api/empleado/read.php"));
$router->post("/api/v1/empleados", base_path("api/empleado/create.php")); //only auth
$router->put("/api/v1/empleados", base_path("api/empleado/update.php")); //only auth
$router->delete("/api/v1/empleados", base_path("api/empleado/delete.php")); //only auth
//
//pruebas
$router->get("/api/v1/permisos", base_path("api/permiso/read.php"));
$router->post("/api/v1/permisos", base_path("api/permiso/create.php")); //only auth
$router->put("/api/v1/permisos", base_path("api/permiso/update.php")); //only auth
$router->delete("/api/v1/permisos", base_path("api/permiso/delete.php")); //only auth
//
//pruebas
$router->get("/api/v1/clientesproveedores", base_path("api/ClienteProveedor/read.php"));
$router->post("/api/v1/clientesproveedores", base_path("api/ClienteProveedor/create.php")); //only auth
$router->put("/api/v1/clientesproveedores", base_path("api/ClienteProveedor/update.php")); //only auth
$router->delete("/api/v1/clientesproveedores", base_path("api/ClienteProveedor/delete.php")); //only auth
//
//pruebas
$router->get("/clienteproveedorrealizapuja", base_path("api/ClienteProveedorRealizaPuja/read.php"));
$router->post("/clienteproveedorrealizapuja", base_path("api/ClienteProveedorRealizaPuja/create.php"));
//



$router->post("/login", controller_path("login/index.php"))->only("guest");
?>
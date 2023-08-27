<?php

$router->get("/", controller_path("home/index.php"));
$router->get("/login", controller_path("login/index.php"))->only("guest");
$router->get("/registro", controller_path("register/index.php"))->only("guest");
//pruebas
$router->get("/remates", base_path("api/remate/read.php"));
$router->post("/remates", base_path("api/remate/read.php")); //only auth
$router->put("/remates", base_path("api/remate/read.php")); //only auth
$router->delete("/remates", base_path("api/remate/read.php")); //only auth
//
//pruebas
$router->get("/empleado", base_path("api/empleado/read.php"));
$router->post("/empleado", base_path("api/empleado/create.php")); //only auth
$router->put("/empleado", base_path("api/empleado/update.php")); //only auth
$router->delete("/empleado", base_path("api/empleado/delete.php")); //only auth
//
//pruebas
$router->get("/permiso", base_path("api/permiso/read.php"));
$router->post("/permiso", base_path("api/permiso/create.php")); //only auth
$router->put("/permiso", base_path("api/permiso/update.php")); //only auth
$router->delete("/permiso", base_path("api/permiso/delete.php")); //only auth
//
//pruebas
$router->get("/clienteproveedor", base_path("api/ClienteProveedor/read.php"));
$router->post("/clienteproveedor", base_path("api/ClienteProveedor/create.php")); //only auth
$router->put("/clienteproveedor", base_path("api/ClienteProveedor/update.php")); //only auth
$router->delete("/clienteproveedor", base_path("api/ClienteProveedor/delete.php")); //only auth
//
//pruebas
$router->get("/clienteproveedorrealizapuja", base_path("api/ClienteProveedorRealizaPuja/read.php"));
$router->post("/clienteproveedorrealizapuja", base_path("api/ClienteProveedorRealizaPuja/create.php"));
//



$router->post("/login", controller_path("login/index.php"))->only("guest");
?>
<?php

//* HOME PATH
$router->get("/", controller_path("home/index.php"));

//* REGISTRO PATHs
//TODO TA LOCO FALTA TODO 😴
$router->get("/registro", controller_path("register/index.php"))->only("guest");


//* LOGIN PATHs
$router->get("/login", controller_path("login/index.php"))->only("guest");
//TODO CAMBIAR COMO SE MANEJAS LOS MENSAJES DE ERROR (ENVIARLOS POR SESSIONS)
$router->post("/login", controller_path("login/index.php"))->only("guest");




//* API PATHs
//! TODO: INVESTIGAR AUTENTICACIÓN (TOKES)
//TODO HACER EL RESTO DE CRUDs
// REMATES
$router->get("/api/v1/remates", base_path("api/remate/read.php"));
$router->post("/api/v1/remates", base_path("api/remate/create.php"));
$router->put("/api/v1/remates", base_path("api/remate/update.php"));
$router->delete("/api/v1/remates", base_path("api/remate/delete.php"));
// EMPLEADOS
$router->get("/api/v1/empleados", base_path("api/empleado/read.php"));
$router->post("/api/v1/empleados", base_path("api/empleado/create.php"));
$router->put("/api/v1/empleados", base_path("api/empleado/update.php"));
$router->delete("/api/v1/empleados", base_path("api/empleado/delete.php"));
// PERMISOS
$router->get("/api/v1/permisos", base_path("api/permiso/read.php"));
$router->post("/api/v1/permisos", base_path("api/permiso/create.php"));
$router->put("/api/v1/permisos", base_path("api/permiso/update.php"));
$router->delete("/api/v1/permisos", base_path("api/permiso/delete.php"));
// PERSONAS
$router->get("/api/v1/personas", base_path("api/persona/read.php"));
$router->post("/api/v1/personas", base_path("api/persona/create.php"));
$router->put("/api/v1/personas", base_path("api/persona/update.php"));
$router->delete("/api/v1/personas", base_path("api/persona/delete.php"));
// ANIMALES
$router->get("/api/v1/animales", base_path("api/animal/read.php"));
$router->post("/api/v1/animales", base_path("api/animal/create.php"));
$router->put("/api/v1/animales", base_path("api/animal/update.php"));
$router->delete("/api/v1/animales", base_path("api/animal/delete.php"));
// USUARIOS
$router->get("/api/v1/usuarios", base_path("api/usuario/read.php"));
$router->post("/api/v1/usuarios", base_path("api/usuario/create.php"));
$router->put("/api/v1/usuarios", base_path("api/usuario/update.php"));
$router->delete("/api/v1/usuarios", base_path("api/usuario/delete.php"));

?>
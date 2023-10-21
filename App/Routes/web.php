<?php
// var_dump(PasswordHash::hashPassword("cliente"));
// $fechaServidor = new DateTime();

// // Definir la fecha que deseas comparar como un objeto DateTime
// $fechaComparar = new DateTime('2023-10-20 12:16:00');

// // Comparar las fechas
// if ($fechaComparar > $fechaServidor) {
//   echo "La fecha a comparar es posterior a la fecha del servidor.";
// } elseif ($fechaComparar < $fechaServidor) {
//   echo "La fecha a comparar es anterior a la fecha del servidor.";
// } else {
//   echo "Las fechas son iguales.";
// }
Container::resolve(Route::class, Container::resolve(Router::class));
// RUTAS DE REMATE
Route::get("/", "RemateController@listarRemates");
Route::get("/remate/{id}", "RemateController@listarLotes");
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");



Route::get("/{idProveedor}/lotes", "ProveedorController@listarLotes"); //! EN DESARROLLO 

Route::get("/admin/remates", "RemateController@listarRemates");
Route::get("/admin/registrar-remate", "AdministradorController@crearRemate");
Route::get("/admin/remate/editar/{idRemate}", "AdministradorController@editarRemate");
Route::get("/admin/lote/editar/{idLote}", "AdministradorController@editarLote");
Route::post("/admin/registrar-remate", "AdministradorController@registrarRemate");


// RUTAS DE USUARIO
Route::get("/login", "LoginController@index");
Route::get("/registro", "RegistroController@index");
Route::post("/registro", "RegistroController@index");
Route::post("/usuario/login", "AuthController@login");
Route::get("/usuario/logout", "AuthController@logout");
Route::dispatch();
?>
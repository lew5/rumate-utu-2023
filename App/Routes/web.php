<?php

Container::resolve(Route::class, Container::resolve(Router::class));
// RUTAS DE REMATE
Route::get("/", "RemateController@listarRemates");
Route::get("/remate/{id}", "RemateController@listarLotes");
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");


Route::get("/{idProveedor}/lotes", "ProveedorController@listarLotes"); //! EN DESARROLLO 
Route::get("/admin/panel-de-control", "AdministradorController@index"); //! EN DESARROLLO 
Route::post("/admin/registrar-remate", "AdministradorController@registrarRemate"); //! EN DESARROLLO 


// RUTAS DE USUARIO
Route::get("/login", "LoginController@index");
Route::get("/registro", "RegistroController@index");
Route::post("/registro", "RegistroController@index");
Route::post("/usuario/login", "AuthController@login");
Route::get("/usuario/logout", "AuthController@logout");
Route::dispatch();
?>
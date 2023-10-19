<?php

Container::resolve(Route::class, Container::resolve(Router::class));
// RUTAS DE REMATE
Route::get("/", "RemateController@listarRemates");
Route::get("/remate/{id}", "RemateController@listarLotes");
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");


Route::get("/{idProveedor}/lotes", "ProveedorController@listarLotes"); //! EN DESARROLLO 
Route::get("/registro", "RegistroController@index");
Route::get("/login", "LoginController@index");


// RUTAS DE USUARIO
Route::post("/usuario/login", "UsuarioController@iniciarSesion");
Route::get("/usuario/logout", "UsuarioController@cerrarSesion");
Route::dispatch();
?>
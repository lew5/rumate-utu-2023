<?php
Container::resolve(Route::class, Container::resolve(Router::class));
Route::get("/", "Home@index");
Route::get("/remate/{id}", "RemateController@show");
Route::get("/{idProveedor}/lotes", "ClienteProveedor@lotesProveedor"); //! EN DESARROLLO 
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");
Route::get("/registro", "Registro@index");
Route::get("/login", "Login@index");
Route::post("/login/login", "Login@login");
Route::get("/home/logout", "Home@logout");
Route::dispatch();
?>
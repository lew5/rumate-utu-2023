<?php
// $clienteModel = Container::resolve(ClienteModel::class);
// var_dump($clienteModel->getPersona(1));
// var_dump($clienteModel->getPersonas());
// $usuarioModel = Container::resolve(UsuarioModel::class);
// var_dump($usuarioModel->getUsuarios());
// var_dump($usuarioModel->getUsuario("juan123"));
// var_dump($usuarioModel->getFullUsuario("juan123"));
// $uc = Container::resolve(UsuarioController::class);
// $uc->iniciarSesion("juan123", "password1");
// die;
Container::resolve(Route::class, Container::resolve(Router::class));
Route::get("/", "Home@index");
Route::get("/remate/{id}", "RemateController@show");
Route::get("/{idProveedor}/lotes", "ClienteProveedor@lotesProveedor"); //! EN DESARROLLO 
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");
Route::get("/registro", "Registro@index");
Route::get("/login", "LoginController@index");
Route::post("/login/validar", "LoginController@validarLogin");
Route::get("/home/logout", "Home@logout");
Route::dispatch();
?>
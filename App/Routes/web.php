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
// $remateModel = Container::resolve(RemateModel::class);
// var_dump($remateModel->getRemates());
// var_dump($remateModel->getRemate(1));
// $proveedorModel = Container::resolve(ProveedorModel::class);
// var_dump($proveedorModel->getLotes(3));
// $clienteModel = Container::resolve(ClienteModel::class);
// var_dump($clienteModel->getClientes());
// var_dump($clienteModel->getCliente(2));
// $loteModel = Container::resolve(LoteModel::class);
// var_dump($loteModel->getLotesDeRemate(4));
// var_dump($loteModel->getLoteDeRemate(2, 2));

// var_dump(Container::resolve(Usuario::class)::iniciarSesion("juan123", "password1"));
// die;
$usuarioService = Container::resolve(UsuarioService::class)->delete("PruebaUser");
// var_dump(Container::resolve(UsuarioService::class)->get("clienteuser"));
// $usuarioModel = Container::resolve(Usuario::class);
// $usuarioModel->setUsername("PruebaUser");
// $usuarioModel->setPassword("PruebaUserPassword");
// $usuarioModel->setEmail("PruebaUserEmail");
// $usuarioModel->setTipo("CLIENTE");
// // $usuarioService->create($usuarioModel);
// $usuarioModel->setPassword("UpdatePruebaUserPassword");
// $usuarioModel->setEmail("UpdatePruebaUserEmail");
// $usuarioModel->setTipo("PROVEEDOR");
// $usuarioService->update($usuarioModel);
die;
Container::resolve(Route::class, Container::resolve(Router::class));
Route::get("/", "HomeController@index");
Route::get("/remate/{id}", "RemateController@listarLotes");
Route::get("/{idProveedor}/lotes", "ClienteProveedor@lotesProveedor"); //! EN DESARROLLO 
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");
Route::get("/registro", "RegistroController@index");
Route::get("/login", "LoginController@index");
Route::post("/login/validar", "LoginController@validarLogin");
Route::get("/home/logout", "HomeController@logout");
Route::dispatch();
?>
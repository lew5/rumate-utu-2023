<?php
// var_dump(Container::resolve(UsuarioRepository::class)->findById(1));
// var_dump(Container::resolve(UsuarioRepository::class)->findByUsername("rootuser"));
// // Ejemplo de crear un nuevo usuario
// $nuevoUsuario = new Usuario();
// $nuevoUsuario->setUsername('johndoe');
// $nuevoUsuario->setPassword('contraseña');
// $nuevoUsuario->setEmail('john.doe@example.com');
// $nuevoUsuario->setTipo('ROOT');
// $usuarioActualizado = [
//   "username_usuario" => "pepe",
//   // "password_usuario" => $usuarioModel->getPassword(),
//   // "email_usuario" => $usuarioModel->getEmail(),
//   // "tipo_usuario" => $usuarioModel->getTipo()
// ];
// var_dump(Container::resolve(UsuarioRepository::class)->addUsuario($nuevoUsuario));
// var_dump(Container::resolve(UsuarioService::class)->deleteUsuario(6));
die;
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
<?php

//! USUARIO 🟢
// Container::resolve(UsuarioService::class)->delete("PruebaUser");
// var_dump(Container::resolve(UsuarioService::class)->getAll());
// var_dump(Container::resolve(UsuarioService::class)->get("adminuser"));
// $usuarioModel = Container::resolve(Usuario::class);
// $usuarioModel->setUsername("PruebaUser");
// $usuarioModel->setPassword("PruebaUserPassword");
// $usuarioModel->setEmail("PruebaUserEmail");
// $usuarioModel->setTipo("CLIENTE");
// Container::resolve(UsuarioService::class)->create($usuarioModel);
// $usuarioModel->setPassword("UpdatePruebaUserPassword");
// $usuarioModel->setEmail("UpdatePruebaUserEmail");
// $usuarioModel->setTipo("PROVEEDOR");
// Container::resolve(UsuarioService::class)->update($usuarioModel);


//! LOTE 🟡
// var_dump(Container::resolve(LoteService::class)->getAll());
// var_dump(Container::resolve(LoteService::class)->get(1));

$loteModel = Container::resolve(Lote::class);
$loteModel->setImagen("imagen epica");
$loteModel->setPrecioBase(12);
$loteModel->setMejorOferta(12);
$loteModel->setIdProveedor(4);

$fichaModel = Container::resolve(Ficha::class);
$fichaModel->setPeso(102);
$fichaModel->setCantidad(2);
$fichaModel->setRaza("Toribio");
$fichaModel->setDescripcion("El mejor lote");

$categoriaModel = Container::resolve(Categoria::class);
$categoriaModel->setNombre("categoriaPrueba");

//! FICHA 🟡
// var_dump(Container::resolve(FichaRepository::class)->findAll());
// var_dump(Container::resolve(FichaRepository::class)->find(1));


//! CATEGORIA 🟡
// var_dump(Container::resolve(CategoriaRepository::class)->findAll());
// var_dump(Container::resolve(CategoriaRepository::class)->find(1));
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
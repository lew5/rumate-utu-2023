<?php

//! USUARIO 🟢
// Container::resolve(UsuarioService::class)->delete("PruebaUser");
// var_dump(Container::resolve(UsuarioService::class)->getAll());
// var_dump(Container::resolve(UsuarioService::class)->getByUsername("adminuser"));
// $usuarioModel = Container::resolve(Usuario::class);
// $usuarioModel->setUsername("PruebaUser");
// $usuarioModel->setPassword("PruebaUserPassword");
// $usuarioModel->setEmail("PruebaUserEmail");
// $usuarioModel->setTipo("CLIENTE");
// Container::resolve(UsuarioService::class)->create($usuarioModel);
// var_dump(Container::resolve(UsuarioService::class)->getAll());
// $usuarioModel->setPassword("UpdatePruebaUserPassword");
// $usuarioModel->setEmail("UpdatePruebaUserEmail");
// $usuarioModel->setTipo("PROVEEDOR");
// Container::resolve(UsuarioService::class)->update($usuarioModel);
// var_dump(Container::resolve(UsuarioService::class)->getAll());


//! LOTE 🟡🟢
// var_dump(Container::resolve(LoteService::class)->getAll());
// var_dump(Container::resolve(LoteService::class)->getById(1));

// $fichaModel = Container::resolve(Ficha::class);
// $fichaModel->setPeso(102);
// $fichaModel->setCantidad(2);
// $fichaModel->setRaza("Toribio");
// $fichaModel->setDescripcion("El mejor lote");

// $loteModel = Container::resolve(Lote::class);
// $loteModel->setImagen("imagen epica");
// $loteModel->setPrecioBase(12.00);
// $loteModel->setMejorOferta(12.00);
// $loteModel->setIdProveedor(4);
// $loteModel->setFicha($fichaModel);
// $loteModel->setIdCategoria(1);
// var_dump(Container::resolve(LoteService::class)->create($loteModel));


// $fichaModel->setId(53);
// $fichaModel->setPeso(220);
// $fichaModel->setCantidad(15);
// $fichaModel->setRaza("update raza");
// $fichaModel->setDescripcion("El pior lote");

// $loteModel->setId(27);
// $loteModel->setIdFicha(52);
// $loteModel->setImagen("update img");
// $loteModel->setPrecioBase(321);
// $loteModel->setMejorOferta(321);
// $loteModel->setIdProveedor(4);
// $loteModel->setFicha($fichaModel);
// $loteModel->setIdCategoria(5);
// var_dump($loteModel);
// var_dump(Container::resolve(LoteService::class)->update($loteModel));
// die;
// var_dump(Container::resolve(LoteService::class)->delete($loteModel));
//! FICHA 🟡
// var_dump(Container::resolve(FichaRepository::class)->findAll());
// var_dump(Container::resolve(FichaRepository::class)->find(1));
// $fichaModel = Container::resolve(Ficha::class);
// $fichaModel->setPeso(102);
// $fichaModel->setCantidad(2);
// $fichaModel->setRaza("Toribio");
// $fichaModel->setDescripcion("El mejor lote");
// var_dump(Container::resolve(FichaRepository::class)->add($fichaModel));

//! CATEGORIA 🟡
// var_dump(Container::resolve(CategoriaRepository::class)->findAll());
// var_dump(Container::resolve(CategoriaRepository::class)->find(1));


//! PERSONA  🟢
// // getAll 🟢
// var_dump(Container::resolve(PersonaService::class)->getAll());
// // getById 🟢
// var_dump(Container::resolve(PersonaService::class)->getById(1));
// // create 🟢
// $personaModel = Container::resolve(Persona::class);
// $personaModel->setNombre('Juan');
// $personaModel->setApellido('Pérez');
// $personaModel->setCi('1234567');
// $personaModel->setBarrio('Centro');
// $personaModel->setCalle('Calle Principal');
// $personaModel->setNumero('123');
// $personaModel->setTelefono('555-1234');
// $personaModel->setEstado('Activo');
// var_dump(Container::resolve(PersonaService::class)->create($personaModel));
// // delete 🟢
// var_dump(Container::resolve(PersonaService::class)->delete(6));

//! REMATE 
// // getAll 🟢
var_dump(Container::resolve(RemateService::class)->getAll());
// // getById 🟢
// var_dump(Container::resolve(RemateService::class)->getById(1));
// // create 🟢
// $remate = Container::resolve(Remate::class);
// $remate->setId(1);
// $remate->setTitulo("Remate de Prueba");
// $remate->setImagen("imagen_prueba.jpg");
// $remate->setFechaInicio("2023-10-16 10:00:00");
// $remate->setFechaFinal("2023-10-17 15:00:00");
// $remate->setEstado("Activo");
// var_dump(Container::resolve(RemateService::class)->create($remate));
// // delete 🟢
// var_dump(Container::resolve(RemateService::class)->delete(5));
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
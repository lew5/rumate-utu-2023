<?php
// Creación de un nuevo remate con más de 5 lotes
$remate = new Remate();
$remate->setTitulo("Subasta de Joyas");
$remate->setImagen("imagen-joyas.jpg");
$remate->setFechaInicio("2023-10-20 09:00:00");
$remate->setFechaFinal("2023-10-25 18:00:00");
$remate->setEstado("Pendiente");

// Creación de varios lotes con fichas asociadas
$lote1 = new Lote();
$lote1->setImagen("joya1.jpg");
$lote1->setPrecioBase(500);
$lote1->setMejorOferta(550);
$lote1->setIdProveedor(4);
$lote1->setIdCategoria(1);
$ficha1 = new Ficha();
$ficha1->setPeso(10);
$ficha1->setCantidad(1);
$ficha1->setRaza("Diamante");
$ficha1->setDescripcion("Anillo de diamante de alta calidad.");
$lote1->setFicha($ficha1);

$lote2 = new Lote();
$lote2->setImagen("joya2.jpg");
$lote2->setPrecioBase(300);
$lote2->setMejorOferta(320);
$lote2->setIdProveedor(4);
$lote2->setIdCategoria(1);
$ficha2 = new Ficha();
$ficha2->setPeso(5);
$ficha2->setCantidad(1);
$ficha2->setRaza("Esmeralda");
$ficha2->setDescripcion("Collar de esmeralda con colgante.");
$lote2->setFicha($ficha2);

$lote3 = new Lote();
$lote3->setImagen("joya3.jpg");
$lote3->setPrecioBase(800);
$lote3->setMejorOferta(820);
$lote3->setIdProveedor(4);
$lote3->setIdCategoria(1);
$ficha3 = new Ficha();
$ficha3->setPeso(8);
$ficha3->setCantidad(1);
$ficha3->setRaza("Rubí");
$ficha3->setDescripcion("Pulsera de rubí con incrustaciones.");
$lote3->setFicha($ficha3);

$lote4 = new Lote();
$lote4->setImagen("joya4.jpg");
$lote4->setPrecioBase(250);
$lote4->setMejorOferta(260);
$lote4->setIdProveedor(4);
$lote4->setIdCategoria(1);
$ficha4 = new Ficha();
$ficha4->setPeso(3);
$ficha4->setCantidad(1);
$ficha4->setRaza("Safiro");
$ficha4->setDescripcion("Anillo de safiro con grabados.");
$lote4->setFicha($ficha4);

$lote5 = new Lote();
$lote5->setImagen("joya5.jpg");
$lote5->setPrecioBase(700);
$lote5->setMejorOferta(710);
$lote5->setIdProveedor(4);
$lote5->setIdCategoria(1);
$ficha5 = new Ficha();
$ficha5->setPeso(12);
$ficha5->setCantidad(1);
$ficha5->setRaza("Zafiro");
$ficha5->setDescripcion("Collar de zafiro con piedras preciosas.");
$lote5->setFicha($ficha5);

// Agregar los lotes al remate
$remate->setLotes([$lote1, $lote2, $lote3, $lote4, $lote5]);

// Crear un servicio de remate
$remateService = new RemateService();

// Crear el remate en la base de datos
var_dump($remateService->createRemate($remate));
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
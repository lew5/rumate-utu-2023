<?php
#region
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
// var_dump(Container::resolve(RemateService::class)->getAll());
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

//! PUJA 
// // getAll 🟢
// var_dump(Container::resolve(PujaService::class)->getAll());
// // getById 🟢
// var_dump(Container::resolve(PujaService::class)->getById(1));
// // create 🟢
// $puja = Container::resolve(Puja::class);
// $puja->setMonto(3000);
// var_dump(Container::resolve(PujaService::class)->create($puja));
// // delete 🟢
// var_dump(Container::resolve(PujaService::class)->delete(4));
// var_dump(Container::resolve(PujaService::class)->getAll());

//! PUJA DE REMATE
// // getAll 🟢
// var_dump(Container::resolve(PujaDeRemateRepository::class)->findAll());
// // getById 🟢
// var_dump(Container::resolve(PujaDeRemateRepository::class)->find(1));
// // create 🟢
// $puja = Container::resolve(Puja::class);
// $puja->setMonto(3000);
// var_dump(Container::resolve(PujaService::class)->create($puja));
// // delete 🟢
// var_dump(Container::resolve(PujaService::class)->delete(4));
// var_dump(Container::resolve(PujaService::class)->getAll());

//! PUJA DE PERSONA
// // getAll 🟢
// var_dump(Container::resolve(PujaDePersonaRepository::class)->findAll());
// // getById 🟢
// var_dump(Container::resolve(PujaDePersonaRepository::class)->find(1));
// // create 🟢
// $puja = Container::resolve(Puja::class);
// $puja->setMonto(3000);
// var_dump(Container::resolve(PujaService::class)->create($puja));
// // delete 🟢
// var_dump(Container::resolve(PujaService::class)->delete(4));
// var_dump(Container::resolve(PujaService::class)->getAll());
//! LOTES POSTULAN REMATE
// // getAll 🟢
// var_dump(Container::resolve(LotePostulaRemateRepository::class)->findAll());
// // getById 🟢
// var_dump(Container::resolve(PujaDePersonaRepository::class)->find(1));
// // create 🟢
// $puja = Container::resolve(Puja::class);
// $puja->setMonto(3000);
// var_dump(Container::resolve(PujaService::class)->create($puja));
// // delete 🟢
// var_dump(Container::resolve(PujaService::class)->delete(4));
// var_dump(Container::resolve(PujaService::class)->getAll());
// $remate = Container::resolve(Remate::class);
// $remate->setLote("a");
// $remate->setLote("b");
// var_dump($remate->getLotes());
#endregion

// Crear una instancia de la clase Ficha y configurar sus atributos
// $ficha = Container::resolve(Ficha::class);
// $ficha->setPeso(10.5);
// $ficha->setCantidad(5);
// $ficha->setRaza("Ejemplo Raza");
// $ficha->setDescripcion("Esta es una descripción de prueba para la ficha.");

// Crear una instancia de la clase Lote y configurar sus atributos, incluyendo la asociación con la instancia de Ficha
// $lote = Container::resolve(Lote::class);
// $lote->setImagen("imagen_ejemplo.jpg");
// $lote->setPrecioBase(50.0);
// $lote->setMejorOferta(55.0);
// $lote->setIdProveedor(4);
// $lote->setIdCategoria(4);
// $lote->setFicha($ficha);

// $remate = Container::resolve(Remate::class);
// $remate->setTitulo("Remate de Ejemplo");
// $remate->setImagen("imagen_remate.jpg");
// $remate->setFechaInicio("2023-10-20");
// $remate->setFechaFinal("2023-10-25");
// $remate->setEstado("Activo");
// for ($i = 0; $i < 50; $i++) {
//   $remate->setLote($lote);
// }
// var_dump($remate);
// var_dump(Container::resolve(RemateService::class)->create($remate));



// Crear una instancia de Usuario y establecer valores de prueba
// $usuario = Container::resolve(Usuario::class);
// $usuario->setUsername("miusuario");
// $usuario->setPassword("mipassword");
// $usuario->setEmail("usuario@example.com");
// $usuario->setTipo("normal");

// // Crear una instancia de Persona y establecer valores de prueba
// $persona = Container::resolve(Persona::class);
// $persona->setNombre("John");
// $persona->setApellido("Doe");
// $persona->setCi("1234567");
// $persona->setBarrio("Mi Barrio");
// $persona->setCalle("Calle Principal");
// $persona->setNumero("123");
// $persona->setTelefono("555-123-4567");
// $persona->setEstado("Activo");
// // Asignar el usuario a la persona (relación entre las clases)
// $persona->setUsuario($usuario);
// var_dump(Container::resolve(RegistroService::class)->create($persona));

// var_dump(Container::resolve(LoginService::class)->login("miusuario", "mipassword"));
// die;
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
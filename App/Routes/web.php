<?php
// Crear un nuevo usuario
$usuario = new Usuario(
  "nuevo_usuario",
  "contrasena123",
  "nuevo_usuario@example.com",
  "cliente"
);

// Crear una nueva persona asociada al usuario
$persona = new Persona();
$persona->setNombre("Juan");
$persona->setApellido("Pérez");
$persona->setCi("777777");
$persona->setBarrio("Centro");
$persona->setCalle("Calle Principal");
$persona->setNumero("123");
$persona->setTelefono("555-1234");
$persona->setEstado("Activo");
$persona->setUsuario($usuario);

// Crear un servicio de registro
$registroService = new RegistroService();

// Registrar el nuevo usuario con su persona
if ($registroService->createUsuarioAndPersona($persona)) {
  echo "El usuario y la persona se registraron correctamente.";
} else {
  echo "Hubo un error al registrar el usuario y la persona.";
}



// // Crear un nuevo usuario
// $usuario = new Usuario(
//   "usuario123",
//   "contrasena123",
//   "usuario123@example.com",
//   "cliente"
// );

// // Crear un servicio de usuario
// $usuarioService = new UsuarioService();

// // Insertar el nuevo usuario en la base de datos
// $usuarioId = $usuarioService->createUsuario($usuario);
// // Comprobar si el usuario se insertó correctamente

// if ($usuarioId) {
//   echo "El usuario se insertó correctamente con ID: $usuarioId";
// } else {
//   echo "Hubo un error al insertar el usuario.";
// }

// // Crear una nueva persona
// $persona = new Persona();
// $persona->setNombre("Juan");
// $persona->setApellido("Pérez");
// $persona->setCi("1234567");
// $persona->setBarrio("Centro");
// $persona->setCalle("Calle Principal");
// $persona->setNumero("123");
// $persona->setTelefono("555-1234");
// $persona->setEstado("Activo");

// // Crear un servicio de persona
// $personaService = new PersonaService();

// // Insertar la nueva persona en la base de datos
// $personaId = $personaService->createPersona($persona);

// // Comprobar si la persona se insertó correctamente
// if ($personaId) {
//   echo "La persona se insertó correctamente con ID: $personaId";
// } else {
//   echo "Hubo un error al insertar la persona.";
// }

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
<?php
// var_dump(PasswordHash::hashPassword("cliente"));
// $fechaServidor = new DateTime();

// // Definir la fecha que deseas comparar como un objeto DateTime
// $fechaComparar = new DateTime('2023-10-20 12:16:00');

// // Comparar las fechas
// if ($fechaComparar > $fechaServidor) {
//   echo "La fecha a comparar es posterior a la fecha del servidor.";
// } elseif ($fechaComparar < $fechaServidor) {
//   echo "La fecha a comparar es anterior a la fecha del servidor.";
// } else {
//   echo "Las fechas son iguales.";
// }

// var_dump(Container::resolve(UsuarioRepository::class)->find());
// var_dump(Container::resolve(UsuarioRepository::class)->findById(1));
// var_dump(Container::resolve(UsuarioRepository::class)->findByUsername("root"));
// var_dump(Container::resolve(UsuarioRepository::class)->findByTipo("administrador"));
var_dump(Container::resolve(UsuarioRepository::class)->updateUsuario([
  'username_usuario' => "lew",
  'tipo_usuario' => "root"
]));
die;




Container::resolve(Route::class, Container::resolve(Router::class));
// RUTAS DE REMATE
Route::get("/", "RemateController@listarRemates");
Route::get("/buscar/remate/{nombre_remate}", "RemateController@listarRematesPorTitulo");
Route::get("/remate/{id}", "LoteController@listarLotes");
Route::get("/remate/{idRemate}/lote/{idLote}", "LoteController@index");



Route::get("/{idProveedor}/lotes", "ProveedorController@listarLotes"); //! EN DESARROLLO 

Route::get("/admin/registrar-remate", "AdministradorController@crearRemate");
Route::get("/admin/remate/eliminar/{idRemate}", "AdministradorController@eliminarRemate");
Route::get("/admin/remate/editar/{idRemate}", "AdministradorController@editarRemate");
Route::post("/admin/remate/editar/{idRemate}", "AdministradorController@editarRemate");
Route::get("/admin/lote/editar/{idLote}", "AdministradorController@editarLote");
Route::post("/admin/lote/editar/{idLote}", "AdministradorController@editarLote");
Route::get("/admin/lote/eliminar/{idLote}", "AdministradorController@eliminarLote");
Route::get("/admin/remate/{idRemate}/registrar-lote", "LoteController@crearLote");
Route::post("/admin/remate/{idRemate}/registrar-lote", "LoteController@crearLote");
Route::post("/admin/registrar-remate", "AdministradorController@registrarRemate");

Route::get("/admin/clientes", "ClienteController@listarClientes");
Route::get("/admin/proveedores", "ProveedorController@listarProveedores");
Route::get("/root/empleados", "RootController@listarAdministradores");
Route::get("/root/registrar-empleado", "RootController@crearAdministrador");
Route::post("/root/registrar-empleado", "RootController@crearAdministrador");


// RUTAS DE USUARIO
Route::get("/login", "LoginController@index");
Route::get("/registro", "RegistroController@index");
Route::post("/registro", "RegistroController@index");
Route::post("/usuario/login", "AuthController@login");
Route::get("/usuario/logout", "AuthController@logout");
Route::get("/perfil/{idUsuario}", "UsuarioController@verPerfil");
Route::post("/perfil/{idUsuario}", "UsuarioController@actualizarPerfil");
Route::dispatch();
?>
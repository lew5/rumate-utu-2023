<?php
session_start();
require_once "Autoloader.php";


// $proveedor_model = Container::resolve(ProveedorModel::class);
// var_dump($proveedor_model->getLotesDeProveedor(3));
// die;


#region //!TEST_USUARIO
//*CRUD USUARIOS ✅
// $usuario_model = Container::resolve(UsuarioModel::class);
// var_dump($usuario_model->obtenerPersonaDeUsuario("admin1"));
// $usuario_model->asignarPersonaAUsuario("admin1", 3);
// var_dump($usuario_model->obtenerUsuarioCompletoPorNombre("juan123"));
// var_dump($usuario_model->asignarPersonaAUsuario("admin1", 3));
// var_dump($usuario_model->validarUsuario("user3"));
// $usuario = Container::resolve(Usuario::class);
// $nuevoUsuario = [
//   'username_usuario' => "usuario4",
//   'password_usuario' => password_hash("123", PASSWORD_BCRYPT),
//   'email_usuario' => "usuario4@example.com",
//   'id_persona_usuario' => "4",
// ];
// $actualizarUsuario = [
//   'email_usuario' => "usuario4@gmail.com"
// ];
// var_dump($usuario_model->crearUsuario($nuevoUsuario));
// $arrayDeUsuarios = $usuario_model->obtenerTodosLosUsuarios();
// var_dump($arrayDeUsuarios);
// $usr = $usuario_model->obtenerUsuario("usuario1");
// var_dump($usr);
// var_dump($usuario_model->borrarUsuario("usuario2"));

// var_dump($usuario_model->actualizarUsuario("usuario4", $actualizarUsuario));
// var_dump($usuario->borrarUsuario("usuario4"));
// var_dump($usuario->obtenerUsuario("usuario4"));
#endregion

#region //!TEST PERSONA
// $persona_model = Container::resolve(PersonaModel::class);
// $personas = $persona_model->obtenerTodasLasPersonas();
// $persona = $persona_model->obtenerPersona(1);
// var_dump($personas);
// var_dump($persona_model->borrarPersona(3));
// $actualizarPersona = [
//   'barrio_persona' => "San Carlos"
// ];
// var_dump($persona_model->obtenerPersonaConUsuario(1));
// $nuevaPersona = [
//   'nombre_persona' => "Pepe",
//   'apellido_persona' => "Nuñez",
//   'ci_persona' => "51442331",
//   'barrio_persona' => "sdasd",
//   'calle_persona' => "asdas",
//   'numero_persona' => "124",
//   'telefono_persona' => "099-11",
// ];
// var_dump($persona_model->actualizarPersona(1, $actualizarPersona));
// var_dump($persona_model->crearPersona($nuevaPersona));
// var_dump($persona_model->obtenerTodasLasPersonas());
#endregion


#region //!TEST CLIENTE


// $cliente_model = Container::resolve(ClienteModel::class);
// $cliente_model->realizarPuja(4000, 2, 3, 3);
// die;
// $cliente = $cliente_model->obtenerCliente(1);
// var_dump($cliente->getUsuario()->getPersona()->getUsuario());
// var_dump($cliente_model->obtenerTodosLosClientes());

#endregion

#region //!TEST LOTE


// $lote_model = Container::resolve(LoteModel::class);
// $nuevo_lote = Container::resolve(Lote::class, 2, 2);
// $nuevo_lote->setIdAdministrador(3);
// var_dump($lote_model->crearLote($nuevo_lote));
// var_dump($lote_model->actualizarLote(7, 1000));
// var_dump($lote_model->borrarLote(7));
// var_dump($lote_model->obtenerLote(4));
// var_dump($lote_model->obtenerTodosLosLotes());
// var_dump($lote_model->obtenerTodosLosLotesDeRemate(1));

#endregion

#region //!TEST REMATE

// $remate_model = Container::resolve(RemateModel::class);
// $data = [
// 'id_persona_empleado_remate' => 3,
// 'estado_remate' => "ACTIVO"
// ];
// var_dump($remate_model->crearRemate($data));
// var_dump($remate_model->actualizarRemate(4, "INACTIVO"));
// var_dump($remate_model->borrarRemate(5));
// var_dump($remate_model->obtenerRemate(4));
// var_dump($remate_model->obtenerTodosLosRemates());
#endregion


?>
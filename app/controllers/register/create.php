<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  parse_str(file_get_contents('php://input'), $data);
  var_dump($data);
  var_dump(Validator::uyCI($data['ci']));
  var_dump(encryptPassword($data['password']));
  var_dump($data['password'] == $data['confirmPassword']);
  var_dump(Validator::email($data['email']));

  $persona = App::resolve("Persona");
  $persona->setNombre($data['name']);
  $persona->setApellido($data['lastname']);
  $persona->setCi($data['ci']);
  $persona->setBarrio($data['city']);
  $persona->setCalle($data['street']);
  $persona->setNumero($data['number']);
  $persona->setTelefono($data['phone']);

  $usuario = App::resolve("Usuario");
  $usuario->setUsername($data['username']);
  $usuario->setPassword($data['password']);
  $usuario->setEmail($data['email']);

  try {
    $db = App::resolve("Database");
    $db->beginTransaction();
    $persona->insert();

    $idPersona_usuario = $persona->lastIdInserted();
    $usuario->setIdPersonaUsuario($idPersona_usuario);
    $usuario->insert();
    $db->commit();
  } catch (PDOException $e) {
    $db->rollBack();
    var_dump($e->getMessage());
  }

}

?>
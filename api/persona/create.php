<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['Persona'])) {
  $persona = App::resolve("Persona");
  $persona->setNombre($_POST['Persona']['nombre']);
  $persona->setApellido($_POST['Persona']['apellido']);
  $persona->setCi($_POST['Persona']['ci']);
  $persona->setBarrio($_POST['Persona']['barrio']);
  $persona->setCalle($_POST['Persona']['calle']);
  $persona->setNumero($_POST['Persona']['numero']);
  $persona->setTelefono($_POST['Persona']['telefono']);
  $persona->insert();
}
?>
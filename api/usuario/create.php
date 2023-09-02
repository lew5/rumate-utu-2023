<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['Usuario'])) {
  $usuario = App::resolve("Usuario");
  $usuario->setUsername($_POST['Usuario']['username']);
  $usuario->setPassword($_POST['Usuario']['password']);
  $usuario->setEmail($_POST['Usuario']['email']);
  $usuario->setIdPersonaUsuario($_POST['Usuario']['idPersona_usuario']);
  $usuario->insert();
}
?>
<?php
header("Content-Type: application/json");
$clienteProveedor = App::resolve("ClienteProveedor");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['idPersona']) && $_POST['estado']) {
  $clienteProveedor->insert($_POST['idPersona'], $_POST['estado']);
}
?>
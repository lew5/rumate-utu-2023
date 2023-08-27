<?php
header("Content-Type: application/json");
$clienteProveedor = App::resolve("ClienteProveedor");
$_PUT = json_decode(file_get_contents("php://input"), true);
if (isset($_GET['id'])) {
  $clienteProveedor->update($_GET['id'], $_PUT['estado']);
}
?>
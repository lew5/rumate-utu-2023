<?php
header("Content-Type: application/json");
$clienteProveedor = App::resolve("ClienteProveedor");
if (isset($_GET['id'])) {
  $clienteProveedor->delete($_GET['id']);
}
?>
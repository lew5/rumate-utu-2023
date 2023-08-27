<?php
header("Content-Type: application/json");
$clienteProveedor = App::resolve("ClienteProveedor");
if (isset($_GET['id'])) {
  $response = json_encode($clienteProveedor->getById($_GET['id']));
} else {
  $response = json_encode($clienteProveedor->getAll());
}
print $response;
?>
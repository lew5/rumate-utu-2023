<?php
header("Content-Type: application/json");
$clienteProveedorRealizaPuja = App::resolve("ClienteProveedorRealizaPuja");
if (isset($_GET['id'])) {
  $response = json_encode($clienteProveedorRealizaPuja->getById($_GET['id']));
} else {
  $response = json_encode($clienteProveedorRealizaPuja->getAll());
}
print $response;
?>
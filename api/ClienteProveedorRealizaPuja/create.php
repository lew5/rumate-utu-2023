<?php
// header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['idPuja']) && $_POST['idClienteProveedor']) {
  $clienteProveedorRealizaPuja = App::resolve("ClienteProveedorRealizaPuja");
  $clienteProveedorRealizaPuja->insert($_POST['idPuja'], $_POST['idClienteProveedor']);
}
?>
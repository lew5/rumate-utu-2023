<?php
header("Content-Type: application/json");
$empleado = App::resolve("Empleado");
$_PUT = json_decode(file_get_contents("php://input"), true);
if (isset($_GET['id'])) {
  $empleado->update($_GET['id'], $_PUT['idPermiso']);
}
?>
<?php
header("Content-Type: application/json");
$empleado = App::resolve("Empleado");
if (isset($_GET['id'])) {
  $empleado->delete($_GET['id']);
}
?>
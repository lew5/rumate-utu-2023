<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['idEmpleado']) && $_POST['idPermiso']) {
  $empleado = App::resolve("Empleado");
  $empleado->insert($_POST['idEmpleado'], $_POST['idPermiso']);
}
?>
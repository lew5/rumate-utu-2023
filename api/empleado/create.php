<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['idPersonaEmpleado']) && $_POST['idPermisoEmpleado']) {
  $empleado = App::resolve("Empleado");
  $empleado->insert($_POST['idPersonaEmpleado'], $_POST['idPermisoEmpleado']);
}
?>
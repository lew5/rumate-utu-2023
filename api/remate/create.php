<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['idEmpleado_remate'])) { // añadir si estado isset
  $remate = App::resolve("Remate");
  $remate->insert($_POST['idEmpleado_remate']);
}
?>
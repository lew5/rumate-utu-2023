<?php
header("Content-Type: application/json");
$empleado = App::resolve("Empleado");
if (isset($_GET['id'])) {
  $response = json_encode($empleado->getById($_GET['id']));
} else {
  $response = json_encode($empleado->getAll());
}
print $response;
?>
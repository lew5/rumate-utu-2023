<?php
header("Content-Type: application/json");
$permiso = App::resolve("Permiso");
$_PUT = json_decode(file_get_contents("php://input"), true);
if (isset($_GET['id'])) {
  $permiso->update($_GET['id'], $_PUT['nombre']);
}
?>
<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);
if (isset($_POST['permiso'])) {
  $permiso = App::resolve("Permiso");
  $permiso->insert($_POST['permiso']);
}
?>
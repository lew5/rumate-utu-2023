<?php
header("Content-Type: application/json");
$permiso = App::resolve("Permiso");
if (isset($_GET['id'])) {
  $permiso->delete($_GET['id']);
}
?>
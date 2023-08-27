<?php
header("Content-Type: application/json");
$permiso = App::resolve("Permiso");
if (isset($_GET['id'])) {
  $response = json_encode($permiso->getById($_GET['id']));
} else {
  $response = json_encode($permiso->getAll());
}
print $response;
?>
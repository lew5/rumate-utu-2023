<?php
header("Content-Type: application/json");
$persona = App::resolve("Persona");
if (isset($_GET['id'])) {
  $response = json_encode($persona->getById($_GET['id']));
} else {
  $response = json_encode($persona->getAll());
}
print $response;
?>
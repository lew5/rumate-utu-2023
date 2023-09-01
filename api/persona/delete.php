<?php
header("Content-Type: application/json");
if (isset($_GET['id'])) {
  $persona = App::resolve("Persona");
  $persona->delete($_GET['id']);
}
?>
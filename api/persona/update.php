<?php
header("Content-Type: application/json");
$_PUT = json_decode(file_get_contents("php://input"), true);
if (isset($_GET['id'])) {
  $persona = App::resolve("Persona");
  $persona->update($_GET['id'], $_PUT['Persona']);
}
?>
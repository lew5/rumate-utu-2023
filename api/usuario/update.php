<?php
header("Content-Type: application/json");
$_PUT = json_decode(file_get_contents("php://input"), true);
if (isset($_GET['username'])) {
  $usuario = App::resolve("Usuario");
  $usuario->update($_GET['username'], $_PUT['Usuario']);
}
?>
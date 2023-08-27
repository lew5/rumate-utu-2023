<?php
header("Content-Type: application/json");
$remate = App::resolve("Remate");
$_PUT = json_decode(file_get_contents("php://input"), true);
if (isset($_GET['id'])) {
  $remate->update($_GET['id'], $_PUT['estado']);
}
?>
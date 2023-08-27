<?php
header("Content-Type: application/json");
$remate = App::resolve("Remate");
if (isset($_GET['id'])) {
  $remate->delete($_GET['id']);
}
?>
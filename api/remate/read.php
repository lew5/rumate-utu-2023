<?php
$remate = App::resolve("Remate");
if (isset($_GET['id'])) {
  header("Content-Type: application/json");
  $response = json_encode($remate->getById($_GET['id']));
} else {
  header("Content-Type: application/json");
  $response = json_encode($remate->getAll());
}
print $response;
?>
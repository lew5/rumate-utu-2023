<?php
header("Content-Type: application/json");
$remate = App::resolve("Remate");
if (isset($_GET['id'])) {
  $response = json_encode($remate->getById($_GET['id']));
} else {
  $response = json_encode($remate->getAll());
}
print $response;
?>
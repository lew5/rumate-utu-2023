<?php

function get($table)
{
  header("Content-Type: application/json");
  if (isset($_GET['id'])) {
    $response = json_encode($table->getById($_GET['id']));
  } else {
    $response = json_encode($table->getAll());
  }
  print $response;
}

?>
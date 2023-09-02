<?php

function get($table, $column = "id")
{
  header("Content-Type: application/json");
  if (isset($_GET[$column])) {
    $response = json_encode($table->getById($_GET[$column]));
  } else {
    $response = json_encode($table->getAll());
  }
  print $response;
}

?>
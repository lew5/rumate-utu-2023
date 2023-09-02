<?php

function deleteData($data, $column = "id")
{
  header("Content-Type: application/json");
  if (isset($_GET[$column])) {
    $data->delete($_GET[$column]);
  }
}

?>
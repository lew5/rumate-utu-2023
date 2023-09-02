<?php

function deleteData($data)
{
  header("Content-Type: application/json");
  if (isset($_GET['id'])) {
    $data->delete($_GET['id']);
  }
}

?>
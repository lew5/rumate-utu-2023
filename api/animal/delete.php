<?php
require_once base_path("api/services/delete.php");
$animal = App::resolve("Animal");
deleteData($animal);
?>
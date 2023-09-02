<?php
require_once base_path("api/services/get.php");
$animal = App::resolve("Animal");
get($animal);
?>
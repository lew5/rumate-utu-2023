<?php
require_once base_path("api/services/get.php");
$permiso = App::resolve("Permiso");
get($permiso);
?>
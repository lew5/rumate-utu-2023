<?php
require_once base_path("api/services/get.php");
$persona = App::resolve("Persona");
get($persona);
?>
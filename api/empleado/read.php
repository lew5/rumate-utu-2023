<?php
require_once base_path("api/services/get.php");
$empleado = App::resolve("Empleado");
get($empleado);
?>
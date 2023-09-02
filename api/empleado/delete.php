<?php
require_once base_path("api/services/delete.php");
$empleado = App::resolve("Empleado");
deleteData($empleado);
?>
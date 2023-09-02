<?php
require_once base_path("api/services/delete.php");
$persona = App::resolve("Persona");
deleteData($persona);
?>
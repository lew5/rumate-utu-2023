<?php
require_once base_path("api/services/delete.php");
$usuario = App::resolve("Usuario");
deleteData($usuario, "username");
?>
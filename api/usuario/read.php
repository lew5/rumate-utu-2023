<?php
require_once base_path("api/services/get.php");
$usuario = App::resolve("Usuario");
get($usuario, "username");
?>
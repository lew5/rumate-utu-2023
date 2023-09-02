<?php
require_once base_path("api/services/delete.php");
$permiso = App::resolve("Permiso");
deleteData($permiso);
?>
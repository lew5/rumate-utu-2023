<?php
const BASE_PATH = __DIR__ . "/../";
$config = require BASE_PATH . "config/config.php";
require BASE_PATH . "app/functions.php";
require BASE_PATH . "app/models/Database.php";
require BASE_PATH . "Response.php";
require BASE_PATH . "router.php";



$db = new Database($config['database'], "root", "");
// $id = 2;
// $res = $db->query("SELECT * FROM usuario WHERE id = ?", [$id])->findOrFail();
$res = $db->query("SELECT * FROM usuario")->get();
vd($res);
?>
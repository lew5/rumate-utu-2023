<?php
/**
 * Configuración de rutas y constantes del sistema.
 */

/**
 * Rutas de directorios del sistema.
 */
const BASE_PATH = __DIR__ . "/../";

/**
 * Carga de archivos y clases necesarias.
 */
require BASE_PATH . "app/core/functions.php";

$config = require base_path("config/config.php");
model("Database.php");
core("Response.php");
core("Validator.php");
require base_path("router.php");




//***************IGNORAR. SOLO PRUEBAS*******************/

$db = new Database($config['database'], "root", "");
$id = 2;
$res = $db->query("SELECT * FROM usuario WHERE id = ?", [$id])->findOrFail();
$res = $db->query("SELECT * FROM usuario")->get();
vd($res);
// $str = "lewaccont@gmail.com";
// $pass = "lewaccotSA3@gmail.com";
// var_dump(Validator::string($str, 1, 100));
// $validEmail = Validator::email($str);
// var_dump(Validator::email($str));
// var_dump($validEmail === true ? $validEmail : $validEmail);
// var_dump(Validator::password($pass));
// $validPassword = Validator::password($pass);
// var_dump($validPassword === true ? $validPassword : $validPassword);

?>
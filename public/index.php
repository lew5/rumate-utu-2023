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
require BASE_PATH . "app/core/functions.php"; // Carga el archivo con funciones generales del sistema.
bootstrap("bootstrap.php"); // Carga el archivo de inicio (bootstrap) de la aplicación.
$db = App::resolve("Database"); // Crea una instancia de la clase Database para interactuar con la base de datos.

// Carga de clases y configuración necesarias.
core("Response.php"); // Carga la clase Response para manejar las respuestas HTTP.
core("Validator.php"); // Carga la clase Validator para realizar validaciones.

// Creación e inicialización del enrutador.
$router = App::resolve("Router"); // Crea una nueva instancia del enrutador.
$routes = require base_path("routes.php"); // Carga el archivo que define las rutas de la aplicación.

// Obtiene la URL solicitada y el método HTTP de la solicitud.
$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Obtiene la URL solicitada (ruta) de la solicitud actual.
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; // Obtiene el método HTTP de la solicitud (POST o el método original si se usa _method).

// Realiza el enrutamiento de la solicitud a través del enrutador.
$router->route($uri, $method);

// ***************IGNORAR. SOLO PRUEBAS*******************

// A continuación se encuentran algunas pruebas que no son parte del funcionamiento real de la aplicación.
// Se utilizan para probar algunas funcionalidades como la conexión a la base de datos y las validaciones.

// $db = new Database($config['database'], "root", "");
// $id = 2;
// $res = $db->query("SELECT * FROM usuario WHERE id = ?", [$id])->findOrFail();
// $res = $db->query("SELECT * FROM usuario")->get();
// vd($res);
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
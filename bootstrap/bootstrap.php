<?php
/**
 * Inicio de la aplicación y configuración del contenedor de dependencias.
 *
 * Este script se encarga de iniciar la aplicación y configurar el contenedor de dependencias para resolver y gestionar las clases necesarias.
 */

// Carga de archivos y clases necesarias.
// Cargar la clase Container para gestionar el contenedor de dependencias.
bootstrap("/Container.php");

// Cargar la clase App para configurar y resolver dependencias.
bootstrap("/App.php");

// Cargar la clase Database para manejar la conexión a la base de datos.
model("Database.php");

// Cargar la clase Router para manejar las rutas de la aplicación.
core("Router.php");

// Creación del contenedor de dependencias.
$container = new Container(); // Crea una nueva instancia del contenedor de dependencias.

// Configuración del contenedor.
// Se vincula la clave "Database" con una función anónima que crea y devuelve una nueva instancia de la clase Database.
$container->bind("Database", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");

  // Crea y devuelve una nueva instancia de la clase Database con los datos de configuración y las credenciales de conexión.
  return new Database($config['database'], "root", "");
});

// Se vincula la clave "Router" con una función anónima que crea y devuelve una nueva instancia de la clase Router.
$container->bind("Router", function () {
  // Crea y devuelve una nueva instancia de la clase Router para manejar las rutas de la aplicación.
  return new Router();
});

// Establece el contenedor configurado en la clase App.
App::setContainer($container);

?>
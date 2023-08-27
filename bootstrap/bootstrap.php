<?php
/**
 * Inicio de la aplicación y configuración del contenedor de dependencias.
 *
 * Este script se encarga de iniciar la aplicación y configurar el contenedor de dependencias para resolver y gestionar las clases necesarias.
 */

// Carga de archivos y clases necesarias.

// Incluir la definición de la clase Container para gestionar el contenedor de dependencias.
bootstrap("/Container.php");

// Incluir la definición de la clase App para configurar y resolver dependencias.
bootstrap("/App.php");

// Incluir la definición de la clase Database para manejar la conexión a la base de datos.
model("Database.php");

// Incluir la definición de la clase User (modelo de usuario).
model("User.php");
// Incluir la definición de la clase Remate (modelo de remate).
model("Remate.php");
// Incluir la definición de la clase Remate (modelo de empleado).
model("Empleado.php");
// Incluir la definición de la clase Remate (modelo de permiso).
model("Permiso.php");
// Incluir la definición de la clase Remate (modelo de ClienteProveedor).
model("ClienteProveedor.php");
// Incluir la definición de la clase Remate (modelo de ClienteProveedorRealizaPuja).
model("ClienteProveedorRealizaPuja.php");

// Incluir la definición del controlador de autenticación (AuthController).
controller("AuthController.php");

// Incluir la definición del servicio de autenticación (AuthService).
require base_path("app/services/AuthService.php");

// Incluir la definición de la clase Router para manejar las rutas de la aplicación.
core("Router.php");

// Creación del contenedor de dependencias.
$container = new Container(); // Crea una nueva instancia del contenedor de dependencias.

// Configuración del contenedor.

// Vincular la clave "Database" con una función anónima que crea y devuelve una nueva instancia de la clase Database.
$container->bind("Database", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");

  // Crea y devuelve una nueva instancia de la clase Database con los datos de configuración y las credenciales de conexión.
  return new Database($config['database'], "root", "");
});

$container->bind("User", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");
  // Crea y devuelve una nueva instancia de la clase User.
  return new User($config['database'], "root", "");
});

$container->bind("Remate", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");
  // Crea y devuelve una nueva instancia de la clase Remate.
  return new Remate($config['database'], "root", "");
});

$container->bind("Empleado", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");
  // Crea y devuelve una nueva instancia de la clase Empleado.
  return new Empleado($config['database'], "root", "");
});

$container->bind("Permiso", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");
  // Crea y devuelve una nueva instancia de la clase Permiso.
  return new Permiso($config['database'], "root", "");
});
$container->bind("ClienteProveedor", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");
  // Crea y devuelve una nueva instancia de la clase Permiso.
  return new ClienteProveedor($config['database'], "root", "");
});
$container->bind("ClienteProveedorRealizaPuja", function () {
  // Obtiene la configuración de la base de datos desde el archivo de configuración.
  $config = require base_path("config/config.php");
  // Crea y devuelve una nueva instancia de la clase Permiso.
  return new ClienteProveedorRealizaPuja($config['database'], "root", "");
});

// Vincular la clave "Router" con una función anónima que crea y devuelve una nueva instancia de la clase Router.
$container->bind("Router", function () {
  // Crea y devuelve una nueva instancia de la clase Router para manejar las rutas de la aplicación.
  return new Router();
});

// Vincular la clave "AuthService" con una función anónima que crea y devuelve una nueva instancia de la clase AuthService.
$container->bind("AuthService", function () {
  // Resuelve la dependencia del modelo User para el servicio de autenticación.
  return new AuthService(App::resolve("User"));
});

// Vincular la clave "AuthController" con una función anónima que crea y devuelve una nueva instancia de la clase AuthController.
$container->bind("AuthController", function () {
  // Resuelve la dependencia del servicio AuthService para el controlador de autenticación.
  return new AuthController(App::resolve("AuthService"));
});

// Establece el contenedor configurado en la clase App.
App::setContainer($container);

?>
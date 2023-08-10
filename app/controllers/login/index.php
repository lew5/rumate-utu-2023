<?php
/**
 * Este fragmento de código inicia el proceso de inicio de sesión utilizando el controlador de autenticación.
 */

// Obtener una instancia del controlador de autenticación.
$auth = App::resolve("AuthController");

// Llamar al método "login()" del controlador de autenticación para iniciar el proceso de inicio de sesión.
$auth->login();
?>
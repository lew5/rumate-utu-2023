<?php
/**
 * Configuración de la base de datos
 * 
 * Este archivo contiene la configuración de la conexión a la base de datos.
 * 
 * @return array Un array que contiene los parámetros de configuración de la base de datos.
 */
return [
  'database' => [
    'host' => 'localhost',
    // La dirección del servidor de la base de datos (generalmente 'localhost' o una dirección IP).
    'port' => 3306,
    // El puerto del servidor de la base de datos (por defecto, el puerto de MySQL es 3306).
    'dbname' => 'primera_entrega_db',
    // El nombre de la base de datos a la que se conectará la aplicación.
    'charset' => 'utf8mb4' // El conjunto de caracteres utilizado para la comunicación con la base de datos.
  ],
];
?>
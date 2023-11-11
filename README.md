# Configuración del Proyecto "Rumate" en WampServer 3.3.0

Este README te guiará a través de los pasos necesarios para configurar el proyecto "Rumate" en WampServer. Asegúrate de tener WampServer instalado en tu sistema antes de comenzar.

Puedes ver el proyecto en [GitHub](https://github.com/lew5/rumate)

## Requisitos previos

- Asegúrate de tener WampServer 3.3.0 instalado en tu sistema. Si aún no lo has hecho, puedes descargarlo desde [el sitio web oficial de WampServer](http://www.wampserver.com/).

## Paso 1: Copiar y Pegar el Proyecto

- Copia la carpeta del proyecto `rumate`.
- Pega la carpeta del proyecto en el directorio www de WampServer.

## Paso 2: Crear un Alias para "Rumate"

- Abre WampServer y haz clic en el icono en la bandeja del sistema.
-  Selecciona `Apache`,luego elige `Alias directories` y luego haz clic en `Add an alias`.
- Se abrirá una terminal que primero te pedirá ingresar el nombre del alias, ingresa `rumate` y luego te pedirá una ruta, ingresa la ruta del proyecto, por ejemplo `C:/wamp64/www/rumate`

## Paso 3: Importar la Base de Datos

- Ubica el archivo `rumate_db.sql` que estaba dentro dentro del archivo comprimido y ejecútalo en tu sistema de gestión de bases de datos para crear la base de datos y sus tablas.

## Paso 4: Crear Variable de Entorno PHP

- Copia la ruta de la instalación de PHP en WampServer, por lo general se encuentra en `C:/wamp64/bin/php/` selecciona la version de php 8.0 o superior. por ejemplo `C:/wamp64/bin/php/php8.2.0`

- Abre la configuración avanzada del sistema en Windows 10.

- En la sección `Variables del sistema`, selecciona la variable Path y haz clic en `Editar`.

- Agrega una nueva entrada con la ruta a la instalación de PHP.

## Paso 5: Levantar el Servidor

- Abre el CMD y navega a la carpeta donde se encuentra el archivo server.php del proyecto.
```bash
cd C:/wamp64/www/rumate/server
```
- Ejecuta el siguiente comando para iniciar el servidor.
```bash
php server.php
```
Deberías ver el mensaje "Servidor iniciado..."
## Paso 6: Acceder a la Página "Rumate"

Abre tu navegador web y accede a la página del proyecto "Rumate" utilizando la siguiente URL:

http://localhost/rumate

¡Listo! Ahora deberías tener el proyecto "Rumate" configurado y funcionando en tu entorno WampServer.

## Usuario root
- usuario: `root`
- contraseña: `root`
## Usuario administrador
- usuario: `maria123`
- contraseña: `123`
## Usuario cliente
- usuario: `carlos123`
- contraseña: `123`
## Usuario proveedor
- usuario: `valentina123`
- contraseña: `123`





# Configuración de VirtualHost en WampServer 3.3.0

Este README te guiará a través de los pasos necesarios para configurar un VirtualHost en WampServer 3.3.0 en un entorno Windows. Un VirtualHost te permite alojar múltiples sitios web en un solo servidor local de manera simultánea.

## Requisitos previos

- Asegúrate de tener WampServer 3.3.0 instalado en tu sistema. Si aún no lo has hecho, puedes descargarlo desde [el sitio web oficial de WampServer](http://www.wampserver.com/).

## Paso 1: Abrir la consola de WampServer

- Abre WampServer desde el menú Inicio o el icono en la bandeja del sistema.

## Paso 2: Editar el archivo de configuración de Apache

- Haz clic en el icono de WampServer en la bandeja del sistema.
- En el menú que se despliega, selecciona "Apache" y luego elige "httpd-vhosts.conf". Esto abrirá el archivo de configuración de VirtualHost en tu editor de texto predeterminado.

## Paso 3: Agregar una entrada de VirtualHost

- En el archivo `httpd-vhosts.conf`, puedes agregar una entrada para tu sitio web siguiendo este formato:

```apache
<VirtualHost *:80>
	ServerName rumate
	DocumentRoot "${INSTALL_DIR}/www/rumate/public"
	<Directory  "${INSTALL_DIR}/www/rumate/public/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

- `DocumentRoot`: Debes especificar la ruta completa de la carpeta raíz de tu sitio web. La carpeta raíz de nuestro proyecto es `Public`
- `ServerName`: Este es el nombre del dominio que usarás para acceder a tu sitio localmente. Puedes elegir cualquier nombre de dominio que desees, pero asegúrate de que no coincida con otros VirtualHosts.

## Paso 4: Editar el archivo hosts

- Abre el archivo `hosts` de Windows ubicado en `C:\Windows\System32\drivers\etc\hosts` con privilegios de administrador. Puedes usar un editor de texto como Notepad++ con permisos de administrador para editar este archivo.

- Agrega una línea al final del archivo `hosts` para asociar el nombre del dominio especificado en el VirtualHost con la dirección IP `127.0.0.1`:

```plaintext
127.0.0.1 rumate
```

## Paso 5: Reiniciar WampServer y probar el VirtualHost

- Guarda los cambios en los archivos `httpd-vhosts.conf` y `hosts`.

- Reinicia WampServer desde el icono en la bandeja del sistema.

- Abre tu navegador web y accede a tu sitio web local utilizando el nombre de dominio que especificaste en el VirtualHost, en este caso, `rumate`.

- Debería quedarte algo como esto

```apache
<VirtualHost *:80>
	ServerName rumate
	DocumentRoot "${INSTALL_DIR}/www/rumate/public"
	<Directory  "${INSTALL_DIR}/www/rumate/public/">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

¡Listo! Ahora deberías tener un VirtualHost configurado en tu WampServer 3.3.0. Puedes repetir estos pasos para agregar más VirtualHosts según sea necesario para tus proyectos locales.

# Tutorial de YouTube

[Crear un Virtualhost en Wampserver 3.2 Español en Windows 10](https://www.youtube.com/watch?v=Em0XZh40lhA)

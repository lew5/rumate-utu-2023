<?php
/**
 * Función vd
 * 
 * Muestra el contenido de una variable utilizando var_dump() y detiene la ejecución del script con die().
 * 
 * @param mixed $value La variable a mostrar.
 * @return void No hay retorno, ya que detiene la ejecución del script.
 */
function vd($value)
{
  var_dump($value);
  die();
}

/**
 * Función authorize
 * 
 * Verifica una condición y devuelve un código de respuesta HTTP 403 (FORBIDDEN) si la condición no se cumple.
 * 
 * @param bool $condition La condición a verificar.
 * @param int $status El código de respuesta HTTP a devolver si la condición no se cumple (predeterminado a Response::FORBIDDEN).
 * @return void No hay retorno, ya que llama a la función abort() si la condición no se cumple.
 */
function authorize($condition, $status = Response::FORBIDDEN)
{
  return (!$condition) ?? abort($status);
}

/**
 * Función base_path
 * 
 * Devuelve la ruta completa a un archivo o directorio en relación con la ruta base del sistema.
 * 
 * @param string $path La ruta relativa al archivo o directorio.
 * @return string La ruta completa al archivo o directorio.
 */
function base_path($path)
{
  return BASE_PATH . $path;
}

/**
 * Función model_path
 * 
 * Devuelve la ruta completa a un modelo en relación con la ruta base del sistema.
 * 
 * @param string $path La ruta relativa al modelo.
 * @return string La ruta completa al modelo.
 */
function model_path($path)
{
  return base_path("app/models/" . $path);
}

/**
 * Función view_path
 * 
 * Devuelve la ruta completa a una vista en relación con la ruta base del sistema.
 * 
 * @param string $path La ruta relativa a la vista.
 * @return string La ruta completa a la vista.
 */
function view_path($path)
{
  return base_path("app/views/" . $path);
}

/**
 * Función controller_path
 * 
 * Devuelve la ruta completa a un controlador en relación con la ruta base del sistema.
 * 
 * @param string $path La ruta relativa al controlador.
 * @return string La ruta completa al controlador.
 */
function controller_path($path)
{
  return base_path("app/controllers/" . $path);
}

/**
 * Función core_path
 * 
 * Devuelve la ruta completa a un archivo del núcleo del sistema en relación con la ruta base del sistema.
 * 
 * @param string $path La ruta relativa al archivo del núcleo.
 * @return string La ruta completa al archivo del núcleo.
 */
function core_path($path)
{
  return base_path("app/core/" . $path);
}

/**
 * Función model
 * 
 * Incluye el archivo de un modelo en la aplicación.
 * 
 * @param string $path La ruta al archivo del modelo.
 * @return void No hay retorno, ya que incluye el archivo del modelo.
 */
function model($path) //para un futuro si es necesario. sino eliminarlo
{
  require model_path($path);
}

/**
 * Función view
 * 
 * Incluye el archivo de una vista en la aplicación y extrae los atributos para su uso en la vista.
 * 
 * @param string $path La ruta al archivo de la vista.
 * @param array $attributes Los atributos a extraer para su uso en la vista (predeterminado a []).
 * @return void No hay retorno, ya que incluye el archivo de la vista.
 */
function view($path, $attributes = [])
{
  extract($attributes);
  require view_path($path);
}

/**
 * Función controller
 * 
 * Incluye el archivo de un controlador en la aplicación.
 * 
 * @param string $path La ruta al archivo del controlador.
 * @return void No hay retorno, ya que incluye el archivo del controlador.
 */
function controller($path) //para un futuro si es necesario. sino eliminarlo
{
  require controller_path($path);
}

/**
 * Función core
 * 
 * Incluye el archivo de un componente del núcleo del sistema en la aplicación.
 * 
 * @param string $path La ruta al archivo del componente del núcleo.
 * @return void No hay retorno, ya que incluye el archivo del componente del núcleo.
 */
function core($path)
{
  require core_path($path);
}


/**
 * Método abort
 * 
 * Termina la ejecución del script y envía un código de respuesta HTTP (predeterminado 404 NOT FOUND).
 * 
 * @param int $code El código de respuesta HTTP (por defecto, 404 NOT FOUND).
 * @return void No hay retorno, simplemente termina la ejecución del script con el código de respuesta especificado.
 */
function abort($code = 404)
{

  http_response_code($code);
  // require("app/views/{$code}.php");
  die();

}
?>
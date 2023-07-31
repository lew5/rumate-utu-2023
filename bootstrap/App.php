<?php
/**
 * Clase App
 * 
 * Esta clase representa el contenedor de la aplicación, que se utiliza para resolver y almacenar instancias de objetos en la aplicación.
 */
class App
{

  /**
   * @var mixed $container Contenedor de la aplicación para almacenar objetos resueltos.
   */
  protected static $container;

  /**
   * Método setContainer
   * 
   * Establece el contenedor de la aplicación con el valor proporcionado.
   * 
   * @param mixed $container El contenedor de la aplicación que almacenará objetos resueltos.
   * @return void
   */
  public static function setContainer($container)
  {
    static::$container = $container;
  }

  /**
   * Método getContainer
   * 
   * Obtiene el contenedor de la aplicación actual.
   * 
   * @return mixed El contenedor de la aplicación que almacena objetos resueltos.
   */
  public static function getContainer()
  {
    return static::$container;
  }

  /**
   * Método bind
   * 
   * Registra un enlace (binding) entre una clave (key) y un resolutor (resolver) en el contenedor de la aplicación.
   * 
   * @param string $key La clave con la que se asociará el resolutor en el contenedor.
   * @param mixed $resolver El resolutor que se asociará con la clave en el contenedor.
   * @return void
   */
  public static function bind($key, $resolver)
  {
    static::$container->bind($key, $resolver);
  }

  /**
   * Método resolve
   * 
   * Resuelve una instancia de un objeto previamente registrado en el contenedor de la aplicación.
   * 
   * @param string $key La clave del objeto que se desea resolver.
   * @return mixed La instancia del objeto resuelto o null si no se encuentra en el contenedor.
   */
  public static function resolve($key)
  {
    return static::$container->resolve($key);
  }
}

?>
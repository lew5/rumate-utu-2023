<?php

/**
 * Clase Container
 * 
 * Esta clase representa un contenedor de dependencias que permite vincular claves (keys) con resolutores (resolvers) y resolver instancias de objetos a partir de esas claves.
 */
class Container
{
  /**
   * @var array $bindings Almacena los enlaces entre claves y resolutores.
   */
  protected $bindings = [];

  /**
   * Método bind
   * 
   * Registra un enlace (binding) entre una clave y un resolutor en el contenedor.
   * 
   * @param string $key La clave con la que se asociará el resolutor en el contenedor.
   * @param mixed $resolver El resolutor que se asociará con la clave en el contenedor.
   * @return void
   */
  public function bind($key, $resolver)
  {
    $this->bindings[$key] = $resolver;
  }

  /**
   * Método resolve
   * 
   * Resuelve una instancia de un objeto previamente registrado en el contenedor.
   * 
   * @param string $key La clave del objeto que se desea resolver.
   * @return mixed La instancia del objeto resuelto o una excepción si la clave no se encuentra registrada.
   * @throws Exception Cuando la clave no está registrada en el contenedor.
   */
  public function resolve($key)
  {
    if (!array_key_exists($key, $this->bindings)) {
      throw new Exception("No hay resolutor para la clave '{$key}'.");
    }
    $resolver = $this->bindings[$key];
    return call_user_func($resolver);
  }
}

?>
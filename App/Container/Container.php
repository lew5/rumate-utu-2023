<?php

class Container
{
  private static $bindings = [];

  public static function bind($key, $value)
  {
    self::$bindings[$key] = $value;
  }

  public static function resolve($key, ...$args)
  {
    if (isset(self::$bindings[$key])) {
      $binding = self::$bindings[$key];
      if (is_callable($binding)) {
        return $binding(...$args);
      } else {
        return $binding;
      }
    } elseif (class_exists($key)) {
      return new $key(...$args);
    } else {
      throw new Exception("Dependencia no encontrada: $key");
    }
  }
}
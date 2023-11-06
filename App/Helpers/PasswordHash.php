<?php

/**
 * Clase para el hashing de contraseñas.
 */
class PasswordHash
{
  /**
   * Genera un hash seguro de una contraseña utilizando el algoritmo BCRYPT.
   *
   * @param string $password La contraseña a ser hasheada.
   * @return string         El hash resultante de la contraseña.
   */
  public static function hashPassword($password)
  {
    // Utiliza la función password_hash con el algoritmo BCRYPT para generar un hash seguro.
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Devuelve el hash generado.
    return $hashedPassword;
  }
}

?>
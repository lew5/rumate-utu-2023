<?php

class Validar
{

  /**
   * Constantes de mensajes de error para la validación de contraseña.
   */
  private const ERR_MIN_LENGTH = "La contraseña debe tener al menos 8 caracteres.";
  private const ERR_NO_NUMBER = "La contraseña debe tener al menos un número.";
  private const ERR_NO_UPPERCASE = "La contraseña debe tener al menos una mayúscula.";
  private const ERR_NO_SPECIAL_CHAR = "La contraseña debe tener al menos un carácter especial.";
  private const ERR_NO_VALID_EMAIL = "El email no es valido.";

  /**
   * Método para validar una cadena.
   * 
   * @param string $value El valor a validar.
   * @param int $min La longitud mínima permitida para la cadena (predeterminada a 1).
   * @param int $max La longitud máxima permitida para la cadena (predeterminada a INF).
   * @return bool True si la cadena cumple con los criterios de validación, false en caso contrario.
   */
  public static function string($value, $min = 1, $max = INF)
  {
    $value = trim($value);

    return strlen($value) >= $min && strlen($value) <= $max;
  }

  /**
   * Método para validar una dirección de correo electrónico.
   * 
   * @param string $value La dirección de correo electrónico a validar.
   * @return mixed True si la dirección de correo electrónico es válida,
   *               o un mensaje de error (string) si no es válida.
   */
  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL) ? true : self::ERR_NO_VALID_EMAIL;
  }

  /**
   * Método para validar una contraseña.
   * 
   * @param string $value La contraseña a validar.
   * @return mixed True si la contraseña cumple con los criterios de seguridad,
   *               o un mensaje de error (string) si no cumple con los criterios.
   */
  public static function password($value)
  {
    // Longitud mínima de la contraseña
    $min = 8;

    // Revisa si la contraseña tiene al menos 8 caracteres
    if (strlen($value) < $min) {
      return self::ERR_MIN_LENGTH;
    }

    // Revisa si la contraseña contiene al menos un número
    if (!preg_match('/\d/', $value)) {
      return self::ERR_NO_NUMBER;
    }

    // Revisa si la contraseña contiene al menos una letra mayúscula
    if (!preg_match('/[A-Z]/', $value)) {
      return self::ERR_NO_UPPERCASE;
    }

    // Revisa si la contraseña contiene al menos un caracter especial
    if (!preg_match('/[^a-zA-Z\d]/', $value)) {
      return self::ERR_NO_SPECIAL_CHAR;
    }

    // La contraseña cumple con los criterios de seguridad
    return true;
  }
}
?>
<?php
/**
 * Clase Validator
 * 
 * Esta clase proporciona métodos para validar diferentes tipos de datos, como cadenas y contraseñas.
 */
class Validator
{

  /**
   * Constantes de mensajes de error para la validación de contraseña.
   */
  private const ERR_MIN_LENGTH = "La contraseña debe tener al menos 8 caracteres.";
  private const ERR_NO_NUMBER = "La contraseña debe tener al menos un número.";
  private const ERR_NO_UPPERCASE = "La contraseña debe tener al menos una mayúscula.";
  private const ERR_NO_SPECIAL_CHAR = "La contraseña debe tener al menos un carácter especial.";
  private const ERR_NO_VALID_EMAIL = "El email no es valido.";
  private const ERR_INVALID_CI = "Cédula uruguaya inválida.";
  private const ERR_INVALID_NAME = "El nombre no es valido.";
  private const ERR_INVALID_LAST_NAME = "El apellido no es valido.";

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

  public static function uyCI($value)
  {
    if (preg_match('/^\d{7,8}$/', $value)) {
      return self::validateUyCI($value) ? true : self::ERR_INVALID_CI;
    }
    return self::ERR_INVALID_CI;
  }

  private static function validateUyCI($cedula)
  {
    $cedulaDigits = str_split($cedula);
    $cedulaDigits = array_map('intval', $cedulaDigits);

    $weights = array(2, 9, 8, 7, 6, 3, 4);
    $checksum = 0;

    for ($i = 0; $i < count($weights); $i++) {
      $checksum += $weights[$i] * $cedulaDigits[$i];
    }

    $remainder = $checksum % 10;
    $expectedLastDigit = ($remainder === 0) ? 0 : (10 - $remainder);

    return $expectedLastDigit === $cedulaDigits[count($cedulaDigits) - 1];
  }


  //! DESPUÉS VEMOS QUE PEDO 🤷‍♂️
  public static function validatePersona($persona)
  {
    if (!self::string($persona->getNombre())) {
      return self::ERR_INVALID_NAME;
    }
    if (!self::string($persona->getApellido())) {
      return self::ERR_INVALID_LAST_NAME;
    }
    self::uyCI($persona->getCi());
  }

}
?>
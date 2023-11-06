<?php
/**
 * Formatea una fecha y hora en un formato legible para los usuarios en español.
 *
 * @param string $fechaOriginal La fecha y hora original en formato de cadena.
 * @return string La fecha y hora formateada en español.
 */
function formatFecha($fechaOriginal)
{
  // Establece la zona horaria a 'America/Buenos_Aires'.
  date_default_timezone_set('America/Buenos_Aires');

  // Crea un objeto DateTime a partir de la fecha original.
  $fechaHoraObjeto = new DateTime("$fechaOriginal");

  // Define el locale (configuración regional) para el formateo en español.
  $locale = 'es_ES';

  // Crea un formateador de fechas y horas con formato largo y formato corto en español.
  $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::SHORT);

  // Formatea la fecha y hora utilizando el formateador.
  $fechaHoraFormateada = $formatter->format($fechaHoraObjeto);

  // Devuelve la fecha y hora formateada.
  return $fechaHoraFormateada;
}

?>
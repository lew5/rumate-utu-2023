<?php
function formatFecha($fechaOriginal)
{
  date_default_timezone_set('America/Buenos_Aires');
  $fechaHoraObjeto = new DateTime("$fechaOriginal");
  $locale = 'es_ES';
  $formatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::SHORT);
  $fechaHoraFormateada = $formatter->format($fechaHoraObjeto);
  return $fechaHoraFormateada;
}
?>
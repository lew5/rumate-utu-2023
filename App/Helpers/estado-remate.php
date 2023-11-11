<?php

function pendiente($fechaInicio)
{
  $hoy = date("Y-m-d H:i:s");
  $inicio = $fechaInicio;

  if ($hoy < $inicio) {
    return true; //pendiente
  } else {
    return false;
  }
}

function rematando($fechaInicio, $fechaFinal)
{
  $hoy = date("Y-m-d H:i:s");
  $inicio = $fechaInicio;
  $final = $fechaFinal;
  if ($hoy > $inicio && $hoy < $final) {
    return true; //rematando
  } else {
    return false;
  }
}
function finalizado($fechaFinal)
{
  $hoy = date("Y-m-d H:i:s");
  $final = $fechaFinal;
  if ($hoy > $final) {
    return true; //finalizado
  } else {
    return false;
  }
}

?>
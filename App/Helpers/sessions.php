<?php


function sessionRoot()
{
  if (sessionUsuario()) {
    return sessionUsuario()->tipo_persona == "ROOT";
  } else {
    return false;
  }
}
function sessionAdmin()
{
  if (sessionUsuario()) {
    return sessionUsuario()->tipo_persona == "ADMINISTRADOR";
  } else {
    return false;
  }
}

function sessionCliente()
{
  if (sessionUsuario()) {
    return sessionUsuario()->tipo_persona == "CLIENTE";
  } else {
    return false;
  }
}

function sessionProveedor()
{
  if (sessionUsuario()) {
    return sessionUsuario()->tipo_persona == "PROVEEDOR";
  } else {
    return false;
  }
}

function sessionUsuario()
{
  if (isset($_SESSION['usuario'])) {
    return (object) unserialize($_SESSION['usuario']);
  }
  return false;
}

?>
<?php


function sessionRoot()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "ROOT";
  } else {
    return false;
  }
}
function sessionAdmin()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "ADMINISTRADOR";
  } else {
    return false;
  }
}

function sessionCliente()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "CLIENTE";
  } else {
    return false;
  }
}

function sessionProveedor()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "PROVEEDOR";
  } else {
    return false;
  }
}

function sessionUsuario()
{
  if (isset($_SESSION['usuario'])) {
    return unserialize($_SESSION['usuario']);
  }
  return false;
}

?>
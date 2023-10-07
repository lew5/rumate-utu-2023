<?php


function sessionRoot(): bool
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "ROOT";
  } else {
    return false;
  }
}
function sessionAdmin(): bool
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "ADMINISTRADOR";
  } else {
    return false;
  }
}

function sessionCliente(): bool
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "CLIENTE";
  } else {
    return false;
  }
}

function sessionProveedor(): bool
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "PROVEEDOR";
  } else {
    return false;
  }
}

function sessionUsuario(): mixed
{
  if (isset($_SESSION['usuario'])) {
    return unserialize($_SESSION['usuario']);
  }
  return false;
}

?>
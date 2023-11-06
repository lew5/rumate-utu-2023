<?php

/**
 * Verifica si el usuario en la sesión tiene el rol de ROOT.
 *
 * @return bool Devuelve true si el usuario tiene el rol ROOT, de lo contrario, devuelve false.
 */
function sessionRoot()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "ROOT";
  } else {
    return false;
  }
}

/**
 * Verifica si el usuario en la sesión tiene el rol de ADMINISTRADOR.
 *
 * @return bool Devuelve true si el usuario tiene el rol ADMINISTRADOR, de lo contrario, devuelve false.
 */
function sessionAdmin()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "ADMINISTRADOR";
  } else {
    return false;
  }
}

/**
 * Verifica si el usuario en la sesión tiene el rol de CLIENTE.
 *
 * @return bool Devuelve true si el usuario tiene el rol CLIENTE, de lo contrario, devuelve false.
 */
function sessionCliente()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "CLIENTE";
  } else {
    return false;
  }
}

/**
 * Verifica si el usuario en la sesión tiene el rol de PROVEEDOR.
 *
 * @return bool Devuelve true si el usuario tiene el rol PROVEEDOR, de lo contrario, devuelve false.
 */
function sessionProveedor()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "PROVEEDOR";
  } else {
    return false;
  }
}

/**
 * Verifica si el usuario en la sesión tiene el rol de REMATADOR.
 *
 * @return bool Devuelve true si el usuario tiene el rol REMATADOR, de lo contrario, devuelve false.
 */
function sessionRematador()
{
  if (sessionUsuario()) {
    return sessionUsuario()->getTipo() == "REMATADOR";
  } else {
    return false;
  }
}

/**
 * Obtiene el objeto de usuario serializado almacenado en la sesión.
 *
 * @return mixed Devuelve el objeto de usuario si está almacenado en la sesión, de lo contrario, devuelve false.
 */
function sessionUsuario()
{
  if (isset($_SESSION['usuario'])) {
    return unserialize($_SESSION['usuario']);
  }
  return false;
}
?>

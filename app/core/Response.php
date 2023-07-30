<?php
/**
 * Clase Response
 * 
 * Esta clase proporciona constantes que representan códigos de estado HTTP comunes utilizados en respuestas de servidores web.
 */
class Response
{
  /**
   * Código de estado HTTP 404 - No encontrado.
   * Indica que el servidor no pudo encontrar el recurso solicitado.
   * Se utiliza para indicar que la página o recurso solicitado no existe en el servidor.
   */
  const NOT_FOUND = 404;

  /**
   * Código de estado HTTP 403 - Prohibido (Forbidden).
   * Indica que el servidor comprende la solicitud del cliente, pero se niega a autorizarla.
   * Se utiliza para indicar que el cliente no tiene permiso para acceder al recurso solicitado.
   */
  const FORBIDDEN = 403;
}
?>
<?php

class View
{
  function __construct()
  {
  }

  function cargarView($rutaView, $extension)
  {
    require "app/views/" . $rutaView . $extension;
  }
}

?>
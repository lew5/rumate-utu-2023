<?php

class MainController extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->cargarView("main/index", ".html");
  }

  function Saludar()
  {
    print("Hola");
  }
}

?>
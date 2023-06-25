<?php
class ErrorController extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->cargarView("error/index", ".html");
  }
}
?>
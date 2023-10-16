<?php

class HomeController
{
  public static function index()
  {

  }

  public static function logout()
  {
    session_destroy();
    header("Location: " . PUBLIC_PATH);
  }
}

?>
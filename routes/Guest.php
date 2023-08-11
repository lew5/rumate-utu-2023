<?php

class Guest
{
  public function handle()
  {
    if ($_SESSION['username'] ?? false) {
      header('location: /');
      exit();
    }
  }
}
?>
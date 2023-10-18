<?php

class PasswordHash
{
  public static function hashPassword($password)
  {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    return $hashedPassword;
  }
}

?>
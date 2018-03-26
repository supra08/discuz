<?php

namespace Model;

class RegisterModel
{
  public static function insert($username, $password, $email)
  {
    $db = \DB::get_instance();
    $query = $db->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?, ?)');
      $query->execute([$username, $password, $salt, $email]);

    $query = null;
  }
}

<?php

namespace Model;

class LoginModel
{
  public static function check_pass($username)
  {
    $db = \DB::get_instance();
    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute([$username]);
    $row = $query->fetch();
    return $row;
  }

  public static function get_salt($username)
  {
    $db = \DB::get_instance();
    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute([$username]);
    $row = $query->fetch();
    return $row['salt'];
  }
}

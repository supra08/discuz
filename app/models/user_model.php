<?php

namespace Model;

class UserModel
{
  public static function all($username)
  {
    $db = \DB::get_instance();
    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
        $query->execute([$username]);
    $row = $query->fetch();
    
    return $row;
  }
}

<?php

namespace Model;

class CommentModel
{

  public static function all($id, $sorttype)
  {
    $db = \DB::get_instance();
    if($sorttype == 'votes')
      $stmt = $db->prepare('SELECT * FROM comments WHERE link_id = ? ORDER BY votes DESC');
    else if($sorttype == 'time')
      $stmt = $db->prepare('SELECT * FROM comments WHERE link_id = ? ORDER BY timeposted DESC');
    $stmt->execute([$id]);
    $rows = $stmt->fetchAll();
    return $rows;
  }

  public static function insert($content, $link_id){
      $db = \DB::get_instance();
      $username = $_SESSION['username'];
      $stmt = $db->prepare('INSERT INTO comments (content, link_id, username) VALUES (?, ?, ?)');
      $stmt->execute([$content, $link_id, $username]);
      $stmt = null;
      }
}

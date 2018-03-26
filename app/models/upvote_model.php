<?php

 namespace Model;

 class UpvoteModel
 {
   public static function find($id, $username, $posterusername)
   {
     $db = \DB::get_instance();
     $stmt = $db->prepare('SELECT * FROM links WHERE id = ?');
     $stmt->execute([$id]);
     $rows = $stmt->fetch();
     $votes = $rows['votes'];

     if(UpvoteModel::checkupvote($id, $username))
     {
      $votes--;
      $query = $db->prepare('DELETE FROM user_upvote WHERE link_id = ?');
      $query->execute([$id]);
     }
     else
     {
      $votes++;
      $query = $db->prepare('INSERT INTO user_upvote(username, link_id) VALUES (?, ?)');
      $query->execute([$username, $id]);
     }
     $stmt = $db->prepare('UPDATE links SET votes = ? WHERE id = ?');
     $stmt->execute([$votes, $id]);
     $stmt = $db->prepare('UPDATE users SET votes = ? WHERE username = ?');
     $stmt->execute([$votes, $posterusername]);
     header('Location: /main');
   }

   public static function checkupvote($id, $username)
   {
     $db = \DB::get_instance();
     $query = $db->prepare('SELECT * FROM user_upvote WHERE link_id = ?');
     $query->execute([$id]);
     $data = $query->fetch();
     if($data['username'] === $username)
      return true;
     else
      return false;
   }
 }

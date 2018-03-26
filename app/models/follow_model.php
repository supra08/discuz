<?php

namespace Model;

class FollowModel
{
  public static function getuserid($username)
  {
    $db = \DB::get_instance();

    $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);

    $rows = $stmt->fetch();
    $userid = $rows['id'];

    return $userid;
  }

  public static function createfollow($TargetUserName)
  {
    $username = $_SESSION['username'];
    $followerUserId = \Model\FollowModel::getuserid($username);
    $followingUserId = \Model\FollowModel::getuserid($TargetUserName);

    $db = \DB::get_instance();

    $query = $db->prepare('INSERT INTO follow (follower_id, following_id) VALUES (?, ?)');
      // var_dump($followerUserId);
      // var_dump($followingUserId);
      // die();
    $query->execute([$followerUserId, $followingUserId]);
    header('Location: /profile/'.$TargetUserName.'');

  }

  public static function countFollowers($username)
  {
    $userId = \Model\FollowModel::getuserid($username);
    $db = \DB::get_instance();
    $query = $db->prepare('SELECT * FROM follow WHERE following_id = ?');
    $query->execute([$userId]);
    $count = 0;
    while($query->fetchAll())
      $count++;
    return $count;
  }

  public static function countFollowing($username)
  {
    $userId = \Model\FollowModel::getuserid($username);
    $db = \DB::get_instance();
    $query = $db->prepare('SELECT * FROM follow WHERE follower_id = ?');
    $query->execute([$userId]);
    $count = 0;
    while($query->fetchAll())
      $count++;
    return $count;
  }
}

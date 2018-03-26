<?php

namespace Model;

class LinkModel
{

  public function __construct($id, $title, $url, $name, $timeposted, $tags) {
    $this->id = $id;
    $this->username = $name;
    $this->url = $url;
    $this->title = $title;
    $this->timeposted = $timeposted;
    $this->tags = $tags;
  }

  public static function all(){
    $db = \DB::get_instance();
    $stmt = $db->prepare('SELECT * FROM links');
    $stmt->execute();
    $rows = $stmt->fetchAll();

    $links = [];

    foreach($rows as $row) {
      $tags = TagModel::gettags($row["id"]);


      $links[] = new LinkModel($row['id'], $row['title'], $row['url'], $row['username'], $row['timeposted'], $tags);
    }
    return $links;
  }

  public static function toplinks()
  {
    $db = \DB::get_instance();

    $stmt = $db->prepare('SELECT * FROM links ORDER BY votes DESC');
    $stmt->execute();

    $rows = $stmt->fetchAll();

    return $rows;
  }

  public static function newlinks()
  {
    $db = \DB::get_instance();

    $stmt = $db->prepare('SELECT * FROM links ORDER BY timeposted DESC');
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
  }

  public static function insert($title, $url, $username)
  {
    $db = \DB::get_instance();

    $stmt = $db->prepare('INSERT INTO links (title, url, username) VALUES (?, ?, ?)');
    $stmt->execute([$title, $url, $username]);
    $stmt = null;
    $stmt = $db->prepare('SELECT * FROM links WHERE title = ?');
    $stmt->execute([$title]);
    $data = $stmt->fetch();
    return $data['id'];
  }

  public static function find($id)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare('SELECT * FROM links WHERE id = ?');
    $stmt->execute([$id]);
    $rows = $stmt->fetch();
    return $rows;
  }

  public static function getlinks($username)
  {
    $db = \DB::get_instance();
    $query = $db->prepare('SELECT * FROM links WHERE username = ?');
    $query->execute([$username]);
    $rows = $query->fetchAll();
    return $rows;
  }
}

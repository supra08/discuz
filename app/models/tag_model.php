<?php

  namespace Model;

  class TagModel
  {
    public static function addtag($tags, $id)
    {
      $db = \DB::get_instance();
      $tags_array = explode(",", $tags);
      foreach($tags_array as $tag_each)
      {
        $stmt = $db->prepare('INSERT INTO tags(tag, link_id) VALUES (?, ?)');
        $stmt->execute([$tag_each, $id]);
      }
    }

    public static function gettags($link_id)
    {
      $db = \DB::get_instance();
      $query = $db->prepare('SELECT * FROM tags WHERE link_id = ?');
      $query->execute([$link_id]);
      $rows = $query->fetchAll();
      return $rows;
    }

    public static function getlinks($tag)
    {
      $db = \DB::get_instance();
        $query = $db->prepare('SELECT * FROM links WHERE id IN (SELECT link_id FROM tags WHERE tag = ?)');
        //$query = $db->prepare('SELECT * FROM tags WHERE tag = ?');
        $query->execute([trim($tag)]);
        $rows = $query->fetchAll();
        return $rows;
    }
  }

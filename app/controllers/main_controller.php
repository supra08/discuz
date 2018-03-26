<?php

namespace Controller;

class MainController
{
  public function get(){
    $links = \Model\LinkModel::all();
    $username = $_SESSION['username'];
    echo \View\Loader::make()->render('templates/main.twig', array('links' => $links, 'username' => $username));

  }

  public function post(){
    //create new model and save in db
    $title = $_POST['title'];
    $url = $_POST['url'];
    $tags = trim($_POST['tags']);
    $username = $_SESSION['username'];

    $linkid = \Model\LinkModel::insert($title, $url, $username);

    if($tags!=null)
    {
      \Model\TagModel::addtag($tags, $linkid);
    }


    $links = \Model\LinkModel::all();
    var_dump($links);
    echo \View\Loader::make()->render('templates/main.twig', array('links' => $links, 'username' => $username));

  }

  public function post_xhr()
  {
    $linkid = $_POST['link'];
    echo \View\Loader::make()->render('templates/main.twig', array('links' => $links, 'username' => $username, 'linkid' => $linkid));
  }
}

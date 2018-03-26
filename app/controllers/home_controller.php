<?php

namespace Controller;

class HomeController
{
  public function get(){
    $links = \Model\LinkModel::all();
    echo \View\Loader::make()->render('templates/home.twig', array('links' => $links));
  }

  public function post(){
    //create new model and save in db
    $title = $_POST['title'];
    $url = $_POST['url'];
    $username = $_POST['username'];

    \Model\LinkModel::insert($title, $url, $username);


    $links = \Model\LinkModel::all();

    $array_length = count($links);

    $trending_links = array();

    for($i=0; $i<$array_length; $i++)
    {
      $timeint = strtotime($links[$i]['timeposted']);
      $trending_links[($links[$i]['votes']+1)/$timeint] = $links[$i];
    }

    krsort($links['timeposted']);
    echo \View\Loader::make()->render('templates/home.twig', array('links' => $trendinglinks));

  }
}

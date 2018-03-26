<?php

namespace Controller;

class LinkController
{
  function get($slug1, $slug2)
  {
    $links = \Model\LinkModel::find($slug1);
    $comments = \Model\CommentModel::all($slug1, $slug2);
    echo \View\Loader::make()->render('templates/link.twig', array('links' => $links, 'comments'=>$comments));

    // $links = \Model\LinkModel::all();
    // echo \View\Loader::make()->render('templates/home.twig', array('links' => $links));
  }

  public function post($slug){
    //create new model and save in db
    $content = $_POST['content'];
    \Model\CommentModel::insert($content, $slug);
    $links = \Model\LinkModel::find($slug);
    $comments = \Model\CommentModel::all($slug, 'time');

    echo \View\Loader::make()->render('templates/link.twig', array('links' => $links, 'comments'=>$comments));

  }
}

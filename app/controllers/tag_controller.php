<?php

namespace Controller;

class TagController
{
  public function get($slug)
  {
    $links = \Model\TagModel::getlinks($slug);
    echo \View\Loader::make()->render('templates/tag.twig', array('links' => $links));
  }
}

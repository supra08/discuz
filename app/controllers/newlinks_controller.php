<?php

namespace Controller;

class NewLinksController
{
  public function get(){
    $links = \Model\LinkModel::newlinks();
    echo \View\Loader::make()->render('templates/newlinks.twig', array('links' => $links));
  }
}

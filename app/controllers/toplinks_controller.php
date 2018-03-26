<?php

namespace Controller;

class TopLinksController
{
  public function get(){
    $links = \Model\LinkModel::toplinks();
    echo \View\Loader::make()->render('templates/toplinks.twig', array('links' => $links));
  }
}

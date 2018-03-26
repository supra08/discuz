<?php

namespace Controller;

class FollowController
{
  public function get($slug)
  {
    \Model\FollowModel::createfollow($slug);
    //echo \View\Loader::make()->render('templates/main.twig');
  }
}

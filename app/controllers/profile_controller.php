<?php

namespace Controller;

class ProfileController
{
  public function get($slug)
  {
    $username = $slug;
    $userdata = \Model\UserModel::all($username);
    $followers = \Model\FollowModel::countFollowers($username);
    $following = \Model\FollowModel::countFollowing($username);
    $links = \Model\LinkModel::getlinks($username);
    echo \View\Loader::make()->render('templates/profile.twig', array('userdata' => $userdata, 'followers' => $followers, 'following' => $following, 'links' => $links));
  }
}

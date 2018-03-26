<?php

  namespace Controller;

  class UpvoteController
  {
    public function get($slug1, $slug2)
    {
      $username = $_SESSION['username'];
      \Model\UpvoteModel::find($slug1, $username, $slug2);
    }
  }

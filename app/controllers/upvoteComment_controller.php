<?php

  namespace Controller;

  class UpvoteCommentController
  {
    public function get($slug1, $slug2)
    {
      $username = $_SESSION['username'];
      \Model\UpvoteCommentModel::find($slug1, $username, $slug2);
    }
  }

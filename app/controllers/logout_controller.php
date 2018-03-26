<?php

namespace Controller;

class LogoutController
{
  public function get()
  {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: /');
  }
}

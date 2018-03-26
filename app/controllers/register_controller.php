<?php

namespace Controller;

class RegisterController
{
  public function get()
  {
    echo \View\Loader::make()->render('templates/register.twig');
  }
  public function post()
  {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];

      // $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
      // $saltedPW =  $password . $salt;
      // $hashedPW = hash('sha256', $saltedPW);

      \Model\RegisterModel::insert($username, $hashedPW, $email);
      echo \View\Loader::make()->render('templates/register.twig');
  }
}

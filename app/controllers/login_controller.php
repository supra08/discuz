<?php

namespace Controller;

class LoginController
{
  public function get()
  {
    echo \View\Loader::make()->render('templates/login.twig');
  }
  public function post()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $salt = \Model\LoginModel::get_salt($username);
    // $saltedPW =  $password . $salt;
    // $hashedPW = hash('sha256', $saltedPW);
       $actual_pass = \Model\LoginModel::check_pass($username);

    if($password === $actual_pass['password'])
    {
      // echo \View\Loader::make()->render('templates/home.twig');
      $_SESSION['username'] = $username;
      // \Controller\MainController::get();
      header('Location: /main');
    }
    else{
      // \Controller\RegisterController::get();
      header('Location: /register');
    }


  }
}

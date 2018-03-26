<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require '../vendor/autoload.php';

session_start();

Toro::serve(array(
    "/" => "\Controller\HomeController",
    "/main" => "\Controller\MainController",
    "/login" => "\Controller\LoginController",
    "/register" => "\Controller\RegisterController",
    "/upvote/:number/:alpha" => "\Controller\UpvoteController",
    "/upvoteComment/:number/:alpha" => "\Controller\UpvoteCommentController",
    "/toplinks" => "\Controller\TopLinksController",
    "/newlinks" => "\Controller\NewLinksController",
    "/profile/:alpha" => "\Controller\ProfileController",
    "/follow/:alpha" => "\Controller\FollowController",
    "/logout" => "\Controller\LogoutController",
    "/tag/:alpha" => "\Controller\TagController",
    "/link/:number/:alpha" => "\Controller\LinkController",
));

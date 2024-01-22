<?php

// require dirname(__DIR__).'\views\home.view.php';
// require '..\views\home.view.php';

require '../helpers.php';

$uri=$_SERVER['REQUEST_URI'];
$method=$_SERVER['REQUEST_METHOD'];

// inspect($method);

require basepath('Router.php');
// require basepath('\views\home.view.php');
// loadView("home");
$router=new Router();
$routes=require basepath('routes.php');

$router->route($uri,$method);

// print_r($_SERVER['REQUEST_URI']);




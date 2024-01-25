<?php

// require dirname(__DIR__).'\views\home.view.php';
// require '..\views\home.view.php';

require '../helpers.php';

require basepath('Framework\Router.php');
require basepath('Framework\Database.php');

// inspect($method);


// require basepath('\views\home.view.php');
// loadView("home");
$router=new Router();
$routes=require basepath('routes.php');


$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$method=$_SERVER['REQUEST_METHOD'];

$router->route($uri,$method);

// print_r($_SERVER['REQUEST_URI']);




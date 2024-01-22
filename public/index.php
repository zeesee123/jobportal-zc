<?php

// require dirname(__DIR__).'\views\home.view.php';
// require '..\views\home.view.php';

require '../helpers.php';

require basepath('Router.php');
require basepath('Database.php');





// inspect($method);


// require basepath('\views\home.view.php');
// loadView("home");
$router=new Router();
$routes=require basepath('routes.php');


$uri=$_SERVER['REQUEST_URI'];
$method=$_SERVER['REQUEST_METHOD'];

$router->route($uri,$method);

// print_r($_SERVER['REQUEST_URI']);




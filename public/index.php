<?php

// require dirname(__DIR__).'\views\home.view.php';
// require '..\views\home.view.php';

require '../helpers.php';

// require basepath('Framework\Router.php');
// require basepath('Framework\Database.php');

//autoloader replacement for classes above that i was requiring before

// spl_autoload_register(function($class){

//     $path=basepath('Framework\\'.$class.'.php');

//     inspect($path);

//     if(file_exists($path)){

//         require $path;
//     }
// });

require __DIR__."\..\\vendor\autoload.php";
// inspect($method);

use Framework\Router;


// require basepath('\views\home.view.php');
// loadView("home");
$router=new Router();
$routes=require basepath('routes.php');


$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
// $method=$_SERVER['REQUEST_METHOD'];

// $router->route($uri,$method);
$router->route($uri);

// print_r($_SERVER['REQUEST_URI']);




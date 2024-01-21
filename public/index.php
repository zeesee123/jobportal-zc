<?php

// require dirname(__DIR__).'\views\home.view.php';
// require '..\views\home.view.php';

require '../helpers.php';

// require basepath('\views\home.view.php');
// loadView("home");

// print_r($_SERVER['REQUEST_URI']);
$routes=[
'/'=>'controllers\home.php',
'/listings'=>'controllers\listings\index.php',
'/listings/create'=>'controllers\listings\create.php',
'404'=>'controllers\errors\404.php'
];


$uri=$_SERVER['REQUEST_URI'];

if(array_key_exists($uri,$routes)){

    require basepath($routes[$uri]);

}else{

    echo 'fuckyou';
}
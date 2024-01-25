<?php

// return ['/'=>'controllers\home.php','/listings'=>'controllers\listings\index.php','/listings/create'=>'controllers\listings\create.php','404'=>'controllers\errors\404.php'];

$router->get('/','App\controllers\home.php');
$router->get('/listings','App\controllers\listings\index.php');
$router->get('/listings/create','App\controllers\listings\create.php');
$router->get('404','App\controllers\errors\404.php');
$router->get('/listing','App\controllers\listings\show.php');



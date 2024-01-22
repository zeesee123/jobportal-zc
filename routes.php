<?php

// return ['/'=>'controllers\home.php','/listings'=>'controllers\listings\index.php','/listings/create'=>'controllers\listings\create.php','404'=>'controllers\errors\404.php'];

$router->get('/','controllers\home.php');
$router->get('/listings','controllers\listings\index.php');
$router->get('/listings/create','controllers\listings\create.php');
$router->get('404','controllers\errors\404.php');



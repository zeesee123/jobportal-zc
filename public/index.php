<?php

// require dirname(__DIR__).'\views\home.view.php';
// require '..\views\home.view.php';

require '../helpers.php';

$uri=$_SERVER['REQUEST_URI'];

require basepath('router.php');
// require basepath('\views\home.view.php');
// loadView("home");

// print_r($_SERVER['REQUEST_URI']);




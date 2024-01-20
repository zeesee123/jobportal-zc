<?php


function basepath($path=''){

    return __DIR__.'\\'.$path;

}



function loadView($name){

    
    require basepath("views\\$name.view.php");



}

function loadPartial($partial){

    require basepath("views\partials\\$partial.php");
}


/**
*function below is for dd kind of thing which is there in laravel as well 
*/

function inspect($value){

    echo '<pre>';
    var_dump($value);
    echo '</pre>';

}



function inspectAnDie($value){

    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}
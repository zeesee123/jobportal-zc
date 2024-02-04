<?php


function basepath($path=''){

    // var_dump($path);
    return __DIR__.'\\'.$path;

}



function loadView($name,$data=[]){

    

    $path=basepath("App\\views\\$name.view.php");

    if(file_exists($path)){

        extract($data);

        require $path;

    }else{

        echo "view $name not found";
    }

    
    // require basepath("views\\$name.view.php");



}

function loadPartial($partial){

    require basepath("App\\views\partials\\$partial.php");
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

function sanitize($val){

    return htmlspecialchars($val);
}
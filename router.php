<?php

$routes=require basepath('routes.php');

if(array_key_exists($uri,$routes)){

    require basepath($routes[$uri]);

}else{

    require basepath($routes[404]);

    http_response_code(404);
    
}
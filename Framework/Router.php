<?php

namespace Framework;
// $routes=require basepath('routes.php');

// if(array_key_exists($uri,$routes)){

//     require basepath($routes[$uri]);

// }else{

//     require basepath($routes[404]);

//     http_response_code(404);
    
// }

class Router{

    protected $routes=[];

    // public function registerRoute($method,$uri,$controller){

    //     $this->routes[]=['method'=>$method,'uri'=>$uri,'controller'=>$controller];
    // }

    public function registerRoute($method,$uri,$action){

        list($controller,$controllerMethod)=explode('@',$action);

        // inspect($controller);

        $this->routes[]=['method'=>$method,'uri'=>$uri,'controller'=>$controller,'controllerMethod'=>$controllerMethod];
    }


    public function get($uri,$controllers){

        $this->registerRoute('GET',$uri,$controllers);
    }

    public function post($uri,$controllers){

        $this->registerRoute('POST',$uri,$controllers);
    }

    public function put($uri,$controllers){

        $this->registerRoute('PUT',$uri,$controllers);
    }

    public function delete($uri,$controllers){

        $this->registerRoute("DELETE",$uri,$controllers);
    }


    /**route the request */

    public function route($uri,$method){
        foreach($this->routes as $route){
            if($route['uri']===$uri&&$route['method']===$method){
                // require basepath($route['controller']);

                $controller='App\\controllers\\'.$route['controller'];
                $controllerMethod=$route['controllerMethod'];

                //instantiating the controller instance
                $controllerInstance=new $controller();
                $controllerInstance->$controllerMethod();

                return;
            }
        }
        http_response_code(404);
        loadView('errors\404');
        exit;
    }
}
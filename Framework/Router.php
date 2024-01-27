<?php

namespace Framework;

use App\controllers\ErrorController;
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

    // public function route($uri,$method){

    public function route($uri){

            // print_r($_SERVER);
            // inspect($_SERVER);

        $requestMethod=$_SERVER['REQUEST_METHOD'];
        // inspect($requestMethod);
        // inspect(trim($uri,'/'));
        // inspect(explode('/',$requestMethod));

        foreach($this->routes as $route){

            $uriSegments=explode('/',trim($uri,'/'));

            //splitting the route URI into segments
            $routeSegments=explode('/',trim($route['uri'],'/'));

            $match=true;

            if(count($uriSegments)===count($routeSegments) && strtoupper($route['method'])===$requestMethod){

                $params=[];
                $match=true;

                for($i=0;$i<count($uriSegments);$i++){

                    if($routeSegments[$i]!==$uriSegments[$i] && !preg_match('/\{(.+?)\}/',$routeSegments[$i])){

                        $match=false;
                        break;
                    }

                    if(preg_match('/\{(.+?)\}/',$routeSegments[$i],$matches)){
                        // inspectAnDie($matches);
                        $params[$matches[1]]=$uriSegments[$i];
                        // inspectAnDie($params);
                    }

                }

                if($match){
                    $controller='App\\controllers\\'.$route['controller'];
                    $controllerMethod=$route['controllerMethod'];
    
                    //instantiating the controller instance
                    $controllerInstance=new $controller();
                    // inspectAnDie($params);
                    $controllerInstance->$controllerMethod($params);

                    return;
                }
            }
            // inspect($uriSegments);
            // if($route['uri']===$uri&&$route['method']===$reqestMethod){
            //     // require basepath($route['controller']);

            //     $controller='App\\controllers\\'.$route['controller'];
            //     $controllerMethod=$route['controllerMethod'];

            //     //instantiating the controller instance
            //     $controllerInstance=new $controller();
            //     $controllerInstance->$controllerMethod();

            //     return;
            // }
        }
        
        ErrorController::notFound();
    }
}
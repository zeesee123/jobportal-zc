<?php

namespace App\controllers;

use Framework\Database;

class ErrorController{

    // protected $db;

    // public function __construct(){

    //     // inspectAnDie('hello');
    //     $config=require basepath('config\db.php');

    //     $this->db=new Database($config);
    // }

    // public function index(){


    //     loadView('errors/404');
    // }

    public static function notFound($message="Resource not found"){

        http_response_code('404');

        loadView('errors/404',['status'=>'404','message'=>$message]);

    }
}





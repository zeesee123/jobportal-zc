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

    public function index(){


        loadView('errors/404');
    }
}





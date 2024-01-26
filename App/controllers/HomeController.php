<?php

namespace App\controllers;

use Framework\Database;

class HomeController{

    protected $db;

    public function __construct(){

        // inspectAnDie('hello');
        $config=require basepath('config\db.php');

        $this->db=new Database($config);
    }

    public function index(){


       // $listings=$db->query('SELECT * FROM listing')->fetchAll(PDO::FETCH_ASSOC);
       $listings=$this->db->query('SELECT * FROM listing')->fetchAll();
       // $listings=$db->query('SELECT * FROM listing')->fetchAll();

       // inspect($listings);

       loadView('home',['listings'=>$listings]);
    }
}





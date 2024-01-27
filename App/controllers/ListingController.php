<?php

namespace App\controllers;

use Framework\Database;

class ListingController{

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

       loadView('listings\index',['tommy'=>'Tom']);
    }

    public function create(){


        // $listings=$db->query('SELECT * FROM listing')->fetchAll(PDO::FETCH_ASSOC);
        
        // $listings=$db->query('SELECT * FROM listing')->fetchAll();
 
        // inspect($listings);
 
        loadView('listings\create');
     }

     public function show($param){

      // inspectAnDie($param);

 
      //   $id=$_GET['id']??'';

      

      $id=$param['name']??'';

      // inspect($id);

        $params=['id'=>$id];
        // $listings=$db->query('SELECT * FROM listing')->fetchAll(PDO::FETCH_ASSOC);
        $listings=$this->db->query('SELECT * FROM listing where id=:id',$params)->fetch();//just use fetch instead of fetchAll if there is a single listing involved
        // $listings=$db->query('SELECT * FROM listing')->fetchAll();
        
        if(!$listings){

         ErrorController::notFound();
         return;
        }
        // inspect($listings);
        
        loadView('listings\show',['listings'=>$listings]);
     }
}





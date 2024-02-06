<?php

namespace App\controllers;

use Framework\Database;
use Framework\Validation;

class ListingController{

    protected $db;

    public function __construct(){

        // inspectAnDie('hello');
        $config=require basepath('config\db.php');

        $this->db=new Database($config);
    }

    public function index(){

        inspectAnDie(Validation::email('kk@cc.com'));


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

     
     public function store(){

        $allowedField=['title','desc','salary','req','benefit'];

        $newList=array_intersect_key($_POST,array_flip($allowedField));

        $newList=array_map('sanitize',$newList);

        $requiredField=['title','desc','salary'];

        $errors=[];

        foreach($requiredField as $field){

            if(empty($newList[$field])||!Validation::string(($newList[$field]))){

                $errors[$field]=ucfirst($field).' is required';

            }
        }

        // inspectAnDie($errors);
        if(empty($errors)){

            $this->db->query('INSERT INTO listings (title,description,salary) VALUES (:title,:description,:salary)',$newList);

            $fields=[];

            foreach($newList as $key=>$value){
                $fields[]=$key;
            }

            $fields=implode(',',$fields);

            $values=[];

            foreach($newList as $key=>$value){
                if($value===''){
                    $newList[$key]=null;
                }
                $values[]=':'.$field;
            }

            $values=implode(',',$values);

        }else{

            loadView('listings\create',['errors'=>$errors,'data'=>$newList]);
        }

        // inspect($newList);

        // inspect($_POST);
     }
}





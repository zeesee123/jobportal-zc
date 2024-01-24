<?php

$config=require basepath('config\db.php');

$db=new Database($config);

$id=$_GET['id']??'';

$params=['id'=>$id];
// $listings=$db->query('SELECT * FROM listing')->fetchAll(PDO::FETCH_ASSOC);
$listings=$db->query('SELECT * FROM listing where id=:id',$params)->fetch();//just use fetch instead of fetchAll if there is a single listing involved
// $listings=$db->query('SELECT * FROM listing')->fetchAll();

// inspect($listings);

loadView('listings\show',['listings'=>$listings]);
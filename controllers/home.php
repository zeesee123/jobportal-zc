<?php

$config=require basepath('config\db.php');

$db=new Database($config);

$listings=$db->query('SELECT * FROM listing')->fetchAll(PDO::FETCH_ASSOC);
// $listings=$db->query('SELECT * FROM listing')->fetchAll();

// inspect($listings);

loadView('home',['listings'=>$listings]);
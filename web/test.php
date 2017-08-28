<?php

require '../vendor/libs/rb.php';
$db = require '../config/dbconnect.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);
R::freeze(true);
R::fancyDebug( TRUE );

//var_dump(R::testConnection());

//$poduct = R::dispense( 'product' );

//Create
//$cat = R::dispense('category');
//$cat->title = 'Kategorie 1';
//$id = R::store($cat);

//var_dump($cat);

//Read
//$cat = R::load('category', 4);
//print_r($cat);

//echo $cat->title . '<br>';
//
////Update
//
//$cat->title = 'Kategorie 4';
//R::store($cat);

//
//$cat = R::dispense( 'category' );
//$cat->title = 'Kategorie 4!!!';
//$cat->id = 4;
//R::store($cat);
//echo $cat['title'];

////Delete
//$cat = R::load('category', 4);
//R::trash($cat);

//Tabelle leeren
//R::wipe('category');

//$cats = R::findAll('category');

//$cats = R::findAll('category', 'id > ?', [2]);

//$cats = R::findAll('category', 'title LIKE ?', ['%5%']);

$cat = R::findOne('category', 'id = 6');

echo '<pre>';

print_r($cat);
<?php

require '../vendor/mysrc/libs/rb.php';
$db = require '../config/dbconnect.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);
//R::freeze(true);
R::fancyDebug( TRUE );

//var_dump(R::testConnection());

R::ext('xdispense', function ($table_name) {
    return R::getRedBean()->dispense($table_name);
});

/*
$cat = R::xdispense('category');
$cat->title = 'Kategorie 1';
$cat->parent = 0;
$cat->alias = 'kategorie-link';
$cat->keyword = 'keyword';
$cat->descripton = 'meta beschreibung';
$cat->title_h1 = 'H1 überschrigt';
$cat->title_h2 = 'H2 überschrigt';
$cat->content = 'kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung';
$id = R::store($cat);
 * 
 */

/*
$cat = R::xdispense('categories');
$cat->title = 'Prod Kategorie 1';
$cat->parent = 0;
$cat->alias = 'prod-kategorie-link';
$cat->keyword = 'keyword';
$cat->descripton = 'meta beschreibung';
$cat->title_h1 = 'H1 überschrigt';
$cat->title_h2 = 'H2 überschrigt';
$cat->content = 'kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung kategorie beschreibung';
$id = R::store($cat);
 * 
 */


/*
$poduct = R::xdispense('products');
$poduct->title = 'Produkt Title Demonstration';
$poduct->alias = 'produkt-title-demo';
$poduct->category_id = NULL;
$poduct->produckt_id = NULL;
$poduct->shop_id = NULL;
$poduct->keyword = 'keyword';
$poduct->descripton = 'meta beschreibung';
$poduct->h1_title = 'überschrigt h1';
$poduct->h2_title = 'überschrigt h2';
$poduct->content = 'produkt beschreibung produkt beschreibung';
$poduct->price = 55.00;
$poduct->old_price = 99.00;
$poduct->delivery_price = 4.50;
$poduct->delivery_time = '2 bis 4 Tage';
$poduct->partner_link = 'http://www.webdelin.de';
$poduct->material = 'holz';
$poduct->color = 'weiß';
$poduct->breite = 555;
$poduct->hoeche = 1200;
$poduct->laenge = 1800;
$poduct->gewicht = 5.5;
$poduct->efficiency = 'A++';
$poduct->img = 'https://placehold.it/300x250';
$poduct->img_galery = 'https://placehold.it/300x250,https://placehold.it/300x250,https://placehold.it/300x250';
$id = R::store($poduct);
*/

/*
$user = R::xdispense('user');
$user->login = 'wendelin';
$user->password = '123';
$user->email = 'gereinw@gmail.com';
$user->name = 'Wendelin Gerein';
$user->role = 'admin';
$id = R::store($user);
 */

//$cats = R::findAll('category');

//$cats = R::findAll('category', 'id > ?', [2]);

//$cats = R::findAll('category', 'title LIKE ?', ['%5%']);

//$cat = R::findOne('category', 'id = 6');
//
//echo '<pre>';
//
//print_r($cat);
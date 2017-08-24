<?php
/**
 * PHP 5.6 ->
 *
 * Webdelin-FW Development Framework (https://www.webdelin.de)
 * Copyright 2017, Software Development (https://www.webdelin.de)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @autor           Wendelin Gerein
 * @copyright       Copyright 2017, Webdelin Software Foundation, Inc. (https://www.webdelin.de)
 * @link            https://www.webdelin.de Webdelin-FW(tm) Project
 * @package         src.webroot
 * @since           Webdelin-FW (tm) v 2.0
 * @license         MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


namespace src\controllers;

use src\models\Main;

class MainController extends AppController{
    
    //public $template = 'main';

    public function indexAction() {
        
        $model = new Main;
        //$res = $model->query("CREATE TABLE products SELECT * FROM yii2_loc.product");
        $products = $model->findAll();
        $title = 'Meta Title';
        $this->set(compact('title', 'products')); 
    }
    
}

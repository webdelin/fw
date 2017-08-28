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

class AppController extends \vendor\core\base\Controller{
    
    public $menu;
    public $meta = [];

    public function __construct($route){
        parent::__construct($route);
        if($this->route['action'] == 'test'){
            echo '<h1>Test</h1>';
        }
        new \src\models\Main;
        $this->menu = \R::findAll('category');
    }
    
    protected function setMeta($title = '', $description = '', $keywords = '') {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }
    
}

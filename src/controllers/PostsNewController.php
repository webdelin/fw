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

class PostsNewController extends AppController{
    
    public function indexAction() {
        echo 'PostNew::index';
    }
    
    public function testAction() {
        echo 'PostNew::test';
    }
    
    public function testPageAction() {
        echo 'PostNew::testPage';
    }
    
    public function before() {
        echo 'PostNew::before';
    }
    
}

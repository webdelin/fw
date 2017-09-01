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

namespace src\controllers\admin;

use vendor\core\base\View;

class UserController extends AppController{
    
    public $template = 'default';

    public function indexAction() {
        View::setMeta("Administrationsbereich", "Administrationsbereich beschreibung", "Administrationsbereich");
        $test = "Testvariable";
        $data = ['test' => 'testconzent', 'content_id'=> 55];
//        $this->set([
//            'test' => $test,
//            'data' => $data,
//        ]);
        $this->set(compact('test', 'data'));
    }
    
    public function testAction() {
        $this->template = 'admin';
    }
    
}

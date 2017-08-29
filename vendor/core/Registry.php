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

namespace vendor\core;

class Registry {
    
    use TSingleton;
    
    public static $objects = [];
    
//    protected static $instance;
    
    protected function __construct() {
        require_once ROOT . '/config/config.php';
        foreach ($config['components'] as $name => $component){
            self::$objects[$name] = new $component;
        }
    }    
    
//    public static function instance() {
//        if(self::$instance === null){
//            self::$instance = new self;
//        }
//        return self::$instance;
//    }
    
    public function __get($name) {
        if(is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }
    
    public function __set($name, $object) {
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object;
        }
    }
    
    public function getList() {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }
}

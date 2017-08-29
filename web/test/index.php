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
$config = [
    'components' => [
        'cache' => 'classes\Cache',
        'test' => 'classes\Test'
    ],
];

spl_autoload_register(function($class){
    $file = str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

class Registry {
    
    public static $ojects = [];
    protected static $instance;
    
    protected function __construct() {
        global $config;
        foreach ($config['components'] as $name => $component){
            self::$ojects[$name] = new $component;
        }
    }    
    
    public static function instance() {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function __get($name) {
        if(is_object(self::$ojects[$name])){
            return self::$ojects[$name];
        }
    }
    
    public function __set($name, $object) {
        if(!isset(self::$ojects[$name])){
            self::$ojects[$name] = new $object;
        }
    }
    
    public function getList() {
        echo '<pre>';
        var_dump(self::$ojects);
        echo '</pre>';
    }
}

$app = Registry::instance();
$app->getList();
$app->test->go();
$app->test2 = 'classes\Test2';
$app->getList();
$app->test2->hallo();
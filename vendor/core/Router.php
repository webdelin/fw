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

class Router {
    
    //public function __construct() {
    //    echo 'Hallo Welt!';
    //}
    
    protected static $routes    = [];
    protected static $route     = [];
    
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }
    
    public static function getRoutes(){
        return self::$routes;
    }
    
    public static function getRoute(){
        return self::$route;
    }
    
    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#$pattern#i", $url, $matches)){
                foreach ($matches as $k => $v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = $controller = self::upperCamelCase($route['controller']);

                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    
    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = 'src\controllers\\' . self::$route['controller'];
            //debug(self::$route);
            if(class_exists($controller)){
                $contObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($contObj, $action)){
                    $contObj->$action();
                }  else {
                    echo "Methode <strong>$controller::$action</strong> nicht gefunden";
                }
            }  else {
                echo "Kontroller <strong>$controller</strong> nicht gefunden";
            }
        }  else {
            http_response_code(404);
            include '404.html';
        }
    }
    
    protected static function upperCamelCase($name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }
}

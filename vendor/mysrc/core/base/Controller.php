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

namespace mysrc\core\base;

abstract class Controller {
        
    public $route = [];
    
    public $view;
    
    public $template;
    
    public $vars = [];

    public function __construct($route) {
        $this->route = $route;
        $this->view = $route['action'];
    }
    
    public function getView() {
        $vObj = new View($this->route, $this->template, $this->view);
        $vObj->render($this->vars);        
    }
    
    public function set($vars) {
        $this->vars = $vars;
    }
    
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
    
    public function loadView($view, $vars = []) {
        extract($vars);
        require SRC . "/views/{$this->route['controller']}/{$view}.php";
    }
}
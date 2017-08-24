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

namespace vendor\core\base;

class View {
    
    public $route = [];
    
    public $view;
    
    public $template;
    
    public function __construct($route, $template = '', $view = '') {

        $this->route = $route;
        if ($template === false) {
            $this->template = false;
        }else{
            $this->template = $template ?: TEMPLATE;
        }
        $this->view = $view;
    }
    
    public function render($vars) {
        if(is_array($vars)) extract($vars);
        $file_view = SRC . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            echo "<p>File <strong>$file_view</strong> wurde nicht gefunden</p>";
        }
        
        $content = ob_get_clean();
        if (false !== $this->template) {
            $file_template = SRC . "/views/template/{$this->template}.php";
            if(is_file($file_template)){
                require $file_template;
            }else{
                echo "<p>Template <strong>$file_template</strong> wurde nicht gefunden</p>";
            }
            
        }
        
    }
    
}

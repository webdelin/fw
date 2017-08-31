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

namespace vendor\widgets\menu;
use vendor\libs\Cache;

class Menu {
    
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl = WIDGETS. '/menu/tpl/list.php';
    protected $container = 'ul';
    protected $class = 'MenuClass';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cacheKey = 'webdelin_menu';
    
    
    public function __construct($options = []) {
        $this->tpl = __DIR__ . '/tpl/list.php';
        $this->getOptions($options);
        $this->run();
    }
    
    protected function getOptions($options) {
        foreach ($options as $k => $v) {
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }
    
    protected function output() {
        echo "<{$this->container} class='{$this->class}'>";
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }
    
    protected function run() {
        $cache = new Cache();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = \R::getAssoc("SELECT * FROM {$this->table}");
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
        }
        $this->output();
    }
    
    protected function getTree() {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$value) {
            if(!$value['parent']){
                $tree[$id] = &$value;
            }  else {
                $data[$value['parent']]['childs'][$id] = &$value;
            }
        }
        return $tree;
    }
    
    protected function getMenuHtml($tree, $tab = '') {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->getToTemplate($category, $tab, $id);
        }
        return $str;
    }
    
    protected function getToTemplate($category, $tab, $id) {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
    
}

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
use mysrc\core\App;
use mysrc\core\base\View;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MainController extends AppController{
    
    //public $template = 'main';
    public function indexAction() {
        
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler(ROOT. '/tmp/my_monolog.log', Logger::WARNING));
        
        $log->warning('Foo');
        $log->error('Bar');
        
        $mailer = new PHPMailer(true);
        
        $model = new Main;
        
        $products = App::$app->cache->get('products');
        if(!$products){
            $products = \R::findAll('products');
            App::$app->cache->set('products', $products, 36);
        }
//        echo date('Y-m-d H:i', time()) .'<br>';
//        echo date('Y-m-d H:i', 1504080095) .'<br>';
        $product = \R::findOne('products', 'id = 2');
        $menu = $this->menu;
        $title = 'MainController';
//        $this->setMeta('Start Seite', 'Startseite Description', 'Startseite Schlüsselwort');
        //$meta = $this->meta;
        View::setMeta('Start Seite', 'Startseite Description', 'Startseite Schlüsselwort');
        $this->set(compact('title', 'products', 'menu', 'meta'));
    }
    
    public function testAction() {
        if($this->isAjax()){
            $model = new Main;
//            $data = ['blockInfo' => 'Hallo Welt!', 'code' => 200];
//            echo json_encode($data);
            $product = \R::findOne('products', "id = {$_POST['id']}");
            $this->loadView('_test', compact('product'));
            die;
        }
        echo 2222;
        //$this->template = 'test';
    }
    
}

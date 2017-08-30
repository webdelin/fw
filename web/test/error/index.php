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

define("DEBUG", 0);

class ErrorHandler {

    function __construct() {
        if(DEBUG){
            error_reporting(-1);
        }  else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }
    
    public function errorHandler($errno, $errstr, $errfile, $errline) {
        error_log("[" . date('Y-m-d H:i:s') . "] Fehlermeldungen: {$errstr} | Fehlerhafte Datei: {$errfile} | Fehlerhafte Zeile: {$errline}\n", 3, __DIR__ . '/errors.log');
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }
    
    public function fatalErrorHandler() {
        $error = error_get_last();
        if(!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            error_log("[" . date('Y-m-d H:i:s') . "] Fehlermeldungen: {$error['message']} | Fehlerhafte Datei: {$error['file']} | Fehlerhafte Zeile: {$error['line']}\n", 3, __DIR__ . '/errors.log');
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }  else {
            ob_end_flush();
        }
    }
    
    public function exceptionHandler($e) {
        error_log("[" . date('Y-m-d H:i:s') . "] Fehlermeldungen: {$e->getMessage()} | Fehlerhafte Datei: {$e->getFile()} | Fehlerhafte Zeile: {$e->getLine()}\n", 3, __DIR__ . '/errors.log');
        $this->displayError('#error', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }
    
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500) {
        http_response_code($response);
        if(DEBUG){
            require 'views/developer.php';
        }else{
            require 'views/production.php';
        }
        die;
    }
}

new ErrorHandler();


//echo $test;
//test();
//try{
//    if(empty($test)){
//        throw new Exception('Ups!');
//    }
//} catch (Exception $ex) {
//    var_dump($ex);
//}

//throw new NotFoundException('Ups!');
throw new Exception('Ups!', 503);
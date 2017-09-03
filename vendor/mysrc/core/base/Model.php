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

use mysrc\core\Db;
use Valitron\Validator;

abstract class Model {
    
    protected  $pdo;
    protected  $table;
    protected  $fkey = 'id';
    protected  $field = '';
    protected  $params = [];
    public     $reister = [];
    public     $errors = [];
    public     $rules = [];

    public function __construct() {
        $this->pdo = Db::instance();
    }
    
    public function load($data) {
        foreach ($this->register as $name => $value) {
            if (isset($data[$name])) {
                $this->reister[$name] = $data[$name];
            }
        }
    }
    
    public function validate($data) {
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }
    
    public function query($sql) {
        return $this->pdo->execute($sql);
    }
    
    public function findAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }
    
    public function findOne($id, $field = '') {
        $field = $field ?: $this->fkey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }
    
    public function findBySql($sql, $params = []) {
        return $this->pdo->query($sql, $params);
    }
    
    public function findLike($str, $field, $table = '') {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }
}

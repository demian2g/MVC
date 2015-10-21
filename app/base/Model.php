<?php

namespace app\base;

/**
 * Class Model
 * @package app\base
 */

class Model {

    public $db;

    public function __construct(){
        try {
            $dbConnection = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $dbConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $dbConnection->exec("set names utf8");

            $this->db = $dbConnection;

        } catch(\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
<?php

namespace app\base;

/**
 * Class Model
 * @package app\base
 */

class Model {

    public $columns = [];

    public $db;
    public $_attributes;

    /**
     * Подключение к базе можно вынести в отдельный метод, чтобы не дергать базу каждый раз при создании объекта
     * @param null $attributesArray array
     */
    public function __construct($attributesArray = null){

        $this->_attributes = get_object_vars($this);
        if (is_array($attributesArray)) {
            foreach ($attributesArray as $attribute => $value) {
                if (array_key_exists($attribute, $this->_attributes)) {
                    $this->$attribute = $value;
                }
            }
        }

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

    public function columnLabels(){
        $labels = [];
        foreach ($this->columns as $column) {
            $labels[] = [$column => ucfirst($column)];
        }

        return $labels;
    }

//    public static function tableName(){
//        return;
//    }

    public static function className(){
        return get_called_class();
    }
}
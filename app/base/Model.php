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

    public static function find($params = null) {
        $model = new self;
        if ($params && is_array($params)) {
            $query = [];
            foreach ($params as $param => $value) {
                if ($value != '')
                    $query[$param] = $value;
            }

            if (count($query) > 1) {
                $first = array_slice($query, 0, 1, true);
                $query = array_slice($query, 1, null, true);

                $builder = " WHERE ".array_keys($first)[0]." = '".array_values($first)[0]."'";
                foreach ($query as $key => $value) {
                    $builder .= " AND ".$key." = '".$value."'";
                }
            } else $builder = " WHERE ".array_keys($query)[0]." = '".array_values($query)[0]."'";
            $data = $model->db
                ->query("SELECT * FROM ".self::tableName().$builder."")
                ->fetchAll(\PDO::FETCH_CLASS, self::className());
        } else {
            $data = $model->db
                ->query("SELECT * FROM ".self::tableName()."")
                ->fetchAll(\PDO::FETCH_CLASS, self::className());
        }

        return $data;
    }

    public function columnLabels(){
        $labels = [];
        foreach ($this->columns as $column) {
            $labels[] = [$column => ucfirst($column)];
        }

        return $labels;
    }

    public static function className(){
        return get_called_class();
    }

    public static function map($array = [], $key, $value){
        $map = [];
        foreach ($array as $object) {
            if (is_object($object)) {
                $map[$object->$key] = $object->$value;
            } else {
                $map[$object[$key]] = $object[$value];
            }
        }
        return $map;
    }
}
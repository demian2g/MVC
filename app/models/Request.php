<?php

namespace app\models;

use app\base\Model;

class Request extends Model {

    private $columns = ['email', 'name', 'apartment', 'comment'];

    public $email;
    public $name;
    public $comment;
    public $apartment;

    public static function tableName(){
        return 'requests';
    }

    /**
     * Легкая наркомания
     * @param bool $query
     * @return string
     */
    public function columns($query = false){
        $glue = "`, `";
        if ($query) return '`'.implode($glue, $this->columns).'`';

        else {
            $output = "";
            foreach ($this->columns as $column) {
                $output .= ($this->$column) ? "'". $this->$column ."', " : 'NULL, ';
            }
            $output = substr($output, 0, (strlen($output) - 2));
        }

        return $output;
    }

    public function save($id = null){
        if($id) {
            //UPDATE
        } else {
            $query = 'INSERT into '.self::tableName().' ('.$this->columns(true).') VALUES ('.$this->columns().')';
            $this->db->query($query);
        }

    }
}
<?php

namespace app\models;

use app\base\Model;

class Request extends Model {

    public static function tableName(){
        return 'requests';
    }

    public function test(){
        return $this->db;
    }
}
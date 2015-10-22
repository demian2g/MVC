<?php

namespace app\models;

use app\base\Model;

/**
 * Class Apartment
 * @package app\models
 */

class Apartment extends Model {

    public $id;
    public $value;
    public $rate;
    public $address;
    public $note;

    public static function tableName(){
        return 'apts';
    }


}
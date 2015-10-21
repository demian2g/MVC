<?php

namespace app\models;

use app\base\Model;

/**
 * Class Apartment
 * @package app\models
 */

class Apartment extends Model {

    public static function tableName(){
        return 'apts';
    }
}
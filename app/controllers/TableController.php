<?php

namespace app\controllers;

use app\base\Controller;
use app\models\Apartment;
use app\models\Request;

/**
 * Class TableController
 * @package app\controllers
 */

class TableController extends Controller {


    public function actionIndex($params = null){

//        if ($params && is_array($params)) {
//            $query = [];
//            foreach ($params as $param => $value) {
//                if ($value != '') $query[$param] = $value;
//            }
//
//            if (count($query) < 1) return $this->redirect('index');
//
//            if (count($query) > 1) {
//                $first = array_slice($query, 0, 1, true);
//                $query = array_slice($query, 1, null, true);
//
//                $builder = " WHERE ".array_keys($first)[0]." = '".array_values($first)[0]."'";
//                foreach ($query as $key => $value) {
//                    $builder .= " AND ".$key." = '".$value."'";
//                }
//            } else $builder = " WHERE ".array_keys($query)[0]." = '".array_values($query)[0]."'";
//
//            $data = ((new Apartment())->db
//                ->query("SELECT * FROM ".Request::tableName().$builder."")
//                ->fetchAll(\PDO::FETCH_CLASS, Request::className()));
//
//
//        }

        $x = ['fg545h',4,3,'fgh',6];

        print_r($x);

        for ($i = 0; $i < (count($x)/2); $i++) {
            $temp = $x[$i];
            $x[$i] = $x[count($x) - $i -1];
            $x[count($x) - $i -1] = $temp;
        }

        print_r($x);

        for ($i = 0; $i < (count($x)-1); $i++) {
            $x[$i] = strrev(explode('|', strrev(implode('|', $x)))[$i]);
            $x[count($x)-1-$i] = strrev(explode('|', strrev(implode('|', $x)))[count($x)-1-$i]);
        }

        print_r($x);
//        $data = new Request();
//        return $this->view->render('index', $data::find(), $params);

    }
}
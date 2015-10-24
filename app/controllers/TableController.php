<?php

namespace app\controllers;

use app\base\Controller;
use app\models\Apartment;
use app\models\Request;

class TableController extends Controller {

    public function actionIndex(){
        $data = ((new Apartment())->db->query("SELECT * FROM ".Request::tableName()."")->fetchAll(\PDO::FETCH_CLASS, Request::className()));
        return $this->view->render('table', $data);
    }
}
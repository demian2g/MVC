<?php

namespace app\controllers;

use app\base\Controller;
use app\models\Apartment;

/**
 * Class SiteController
 * @package controllers
 */

class SiteController extends Controller {

    public function actionIndex(){

        $data = ((new Apartment())->db->query("SELECT * FROM ".Apartment::tableName()."")->fetchAll());
        return $this->view->render('index', $data);

    }
}
<?php

namespace app\controllers;

use app\base\Controller;
use app\models\Apartment;
use app\models\Request;

/**
 * Class SiteController
 * @package controllers
 */

class SiteController extends Controller {

    public function actionSandbox(){

        $this->view->layout = 'blank';

        $dsn = 'mysql:dbname=sofydelivery;host=localhost;charset=utf8';
        $user = 'root';
        $password = '123';

        $db = new \PDO($dsn, $user, $password);

        return $this->view->render('map', $db);

    }
    public function actionIndex(){

        return $this->view->render('index', Apartment::getAllApartments());

    }
    public function actionJs(){

        $this->view->layout = 'blank';

        return $this->view->render('js', Apartment::getAllApartments());

    }
}
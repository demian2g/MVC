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

    public function actionIndex(){

        return $this->view->render('index', Apartment::getAllApartments());

    }
}
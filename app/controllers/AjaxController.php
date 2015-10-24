<?php

namespace app\controllers;

use app\base\Controller;
use app\models\Request;

class AjaxController extends Controller{

    public function actionChecker() {
        $json = [];
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $regex = '/.+@.+\..+/i';

        if (preg_match($regex, $email)) {
            $json['email'] = true;
        } else $json['email'] = false;

        $name = isset($_POST['name']) ? $_POST['name'] : null;

        if (strlen($name) > 2) {
            $json['name'] = true;
        } else $json['name'] = false;

        echo json_encode($json);
    }

    public function actionRequest(){
        if (isset($_POST) && isset($_POST['email'])) {
            $request = new Request($_POST);
            if ($request->save()){
                $this->redirect('table/index');
            }
        }
        $this->redirect('site/index');
    }
}
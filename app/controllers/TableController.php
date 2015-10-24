<?php

namespace app\controllers;

use app\base\Controller;
use app\models\Apartment;
use app\models\Request;

class TableController extends Controller {

    /**
     * No-ajax search
     * @param null $params
     */
    public function actionIndex($params = null){

        if ($params && is_array($params)) {
            $query = [];
            foreach ($params as $param => $value) {
                if ($value != '') $query[$param] = $value;
            }

            if (count($query) < 1) return $this->redirect('index');

            if (count($query) > 1) {
                $first = array_slice($query, 0, 1, true);
                $query = array_slice($query, 1, null, true);

                $builder = " WHERE ".array_keys($first)[0]." = '".array_values($first)[0]."'";
                foreach ($query as $key => $value) {
                    $builder .= " AND ".$key." = '".$value."'";
                }
            } else $builder = " WHERE ".array_keys($query)[0]." = '".array_values($query)[0]."'";

            $data = ((new Apartment())->db
                ->query("SELECT * FROM ".Request::tableName().$builder."")
                ->fetchAll(\PDO::FETCH_CLASS, Request::className()));

            return $this->view->render('index', $data);
        }

        $data = ((new Apartment())->db
            ->query("SELECT * FROM ".Request::tableName()."")
            ->fetchAll(\PDO::FETCH_CLASS, Request::className()));

        return $this->view->render('index', $data);
    }

    public function actionSearch(){

        $columns = (new Request())->columns;
        $params = $_POST;

        if ($params && is_array($params)) {

            $query = [];
            foreach ($params as $param => $value) {
                if ($value != '' && in_array($param, $columns))
                    $query[$param] = $value;
            }

            if (count($query) < 1)
                return false;

            if (count($query) > 1) {
                $first = array_slice($query, 0, 1, true);
                $query = array_slice($query, 1, null, true);

                $builder = " WHERE " . array_keys($first)[0] . " = '" . array_values($first)[0] . "'";
                foreach ($query as $key => $value) {
                    $builder .= " AND " . $key . " = '" . $value . "'";
                }
            } else $builder = " WHERE " . array_keys($query)[0] . " = '" . array_values($query)[0] . "'";

            $data = ((new Apartment())->db->query("SELECT * FROM " . Request::tableName() . $builder . "")->fetchAll(\PDO::FETCH_CLASS, Request::className()));

            echo json_encode($data);
        }
    }
}
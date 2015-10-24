<?php

namespace app\base;

/**
 * Class View
 * @package app\base
 */

class View {

    public $layout = 'main';
    public $modelName;

    public function render($view, $data = null, $params){
        include 'app/layouts/' . $this->layout . '.php';
    }
}
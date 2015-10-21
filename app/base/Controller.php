<?php

namespace app\base;

/**
 * Class Controller
 * @package base
 */

class Controller {

    public $layout = 'main';
    public $view;

    public function __construct(){
        $this->view = new View();
    }

    public function getModelName($toLower = false){
        $controllerName = end(explode('\\', get_class($this)));
        $modelName = explode('Controller', $controllerName)[0];

        return $toLower ? strtolower($modelName) : $modelName;
    }
}
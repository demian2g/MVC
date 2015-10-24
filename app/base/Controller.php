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

    public function redirect($url, $options = null){
        $controller = $this->getModelName();
        $action = $url;

        if (explode('/', $url)) {
            $controller = explode('/', $url)[0];
            $action = explode('/', $url)[1];
        }

        if (is_array($options)) {
            $query = '?'.http_build_query($options);
        } else $query = null;

        header('Location: /'. $controller .'/'. $action . $query);
    }
}
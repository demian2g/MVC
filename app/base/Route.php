<?php

/**
 * Class Route
 * @package base
 */

class Route {

    const DEFAULT_CONTROLLER = 'site';
    const DEFAULT_ACTION = 'index';

    const APP_DIR = 'app/';
    const MODEL_PATH = 'app/models/';
    const CONTROLLER_PATH = 'app/controllers/';
    const VIEW_PATH = 'app/views/';

    public $action;
    public $controller;

    private function init_routes() {

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $this->controller = (!empty($routes[1])) ? strtolower($routes[1]) : self::DEFAULT_CONTROLLER;
        $this->action = (!empty($routes[2])) ? strtolower($routes[2]) : self::DEFAULT_ACTION;
    }

    public function init() {

        $this->init_routes();

        $controller = ucfirst($this->controller) . 'Controller';
        $action = 'action' . ucfirst($this->action);

        /** models ? */

        $controllerFile = $controller . '.php';
        $this->loadFile(self::CONTROLLER_PATH . $controllerFile);

        $this->run(new $controller, $action);

    }

    /**
     * TODO: Обработчик ошибок контроллера
     * @param $fileName string
     */
    private function loadFile($fileName){
        try{
            if (file_exists($fileName)) {
                include $fileName;
            }
        } catch (\HttpRequestException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * TODO: Обработчик ошибок вызова экшна
     * @param $controller object of Controller class
     * @param $action string
     */
    private function run($controller, $action){
        try {
            $controller->$action();
        } catch (\BadMethodCallException $e) {
            echo $e->getMessage();
        }
    }
}
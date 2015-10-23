<?php

namespace app\base;

/**
 * Class Route
 * @package base
 */

class Route {

    const DEFAULT_CONTROLLER = 'site';
    const DEFAULT_ACTION = 'index';

    const CONTROLLER_NAMESPACE = '\app\controllers\\';

    public $action;
    public $controller;

    /**
     * Метод не предусматривает GET запросы
     */
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

        $controllerNS = self::CONTROLLER_NAMESPACE . $controller;
        $this->run(new $controllerNS, $action);

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
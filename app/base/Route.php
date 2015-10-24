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
    public $_queryParams = null;

    /**
     * Метод не предусматривает GET запросы
     */
    private function init_routes() {
        $routes = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);

        $this->controller = (!empty($routes[1])) ? strtolower($routes[1]) : self::DEFAULT_CONTROLLER;
        $this->action = (!empty($routes[2])) ? strtolower($routes[2]) : self::DEFAULT_ACTION;

        if (isset(parse_url($_SERVER['REQUEST_URI'])['query'])){
            parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $this->_queryParams);
        }
    }

    public function init() {

        $this->init_routes();

        $controller = ucfirst($this->controller) . 'Controller';
        $action = 'action' . ucfirst($this->action);

        /** models ? */

        $controllerNS = self::CONTROLLER_NAMESPACE . $controller;
        $this->run(new $controllerNS, $action, $this->_queryParams);

    }

    /**
     * TODO: Обработчик ошибок вызова экшна
     * @param $controller
     * @param $action
     * @param $params
     */
    private function run($controller, $action, $params){
        try {
            $controller->$action($params);
        } catch (\BadMethodCallException $e) {
            echo $e->getMessage();
        }
    }
}
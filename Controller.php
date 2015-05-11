<?php

class Controller
{

    protected static $_controller;
    protected static $_action;
    protected static $_param;

    public function init($controller, $action = false, $param = false)
    {
        self::$_controller = $controller;
        self::$_action = $action;
        self::$_param = $param;

        $class = $this->_setController();

        if (self::$_action) {
            $this->_setAction($class);
        }
    }

    protected function _setController()
    {
        $controller = CONTROLLER . self::$_controller;
        $class = new $controller;
        if (!self::$_action) {
            $class->indexAction();
        }

        return $class;
    }

    protected function _setAction($class)
    {
        $action = self::$_action . 'Action';
        $class->$action();
    }

    protected function _setView($values = false)
    {
        if ($values) {
            extract($values);
        }

        if (self::$_action) {
            require_once VIEW . self::$_action . '.php';
        } else if (self::$_controller) {
            require_once VIEW . self::$_controller . '.php';
        }

        exit;
    }

}

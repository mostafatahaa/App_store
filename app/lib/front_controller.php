<?php

namespace PHPMVC\LIB;

class Front_Controller
{
    private $_controller    = "index";
    private $_action        = "default";
    private $_params        = [];

    const NOT_FOUND_ACTION = "notFoundAction";
    const NOT_FOUND_CONTROLLER = "PHPMVC\Controllers\\NotFoundController";

    public function __construct()
    {
        $this->_url();
    }

    public function _url()
    {
        $url = explode("/", trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"), 3);

        if (isset($url[0]) && $url[0] != "") {
            $this->_controller = $url[0];
        }

        if (isset($url[1]) && $url[1] != "") {
            $this->_action = $url[1];
        }

        if (isset($url[2]) && $url[2] != "") {
            $this->_params = explode("/", $url[2]);
        }
    }

    public function dispatch()
    {
        $controller_class_name = "PHPMVC\Controllers\\" . ucfirst($this->_controller) . "Controller";
        $action_name = $this->_action . "Action";

        if (!class_exists($controller_class_name)) {
            $controller_class_name = self::NOT_FOUND_CONTROLLER;
        }

        $controller = new $controller_class_name();

        if (!method_exists($controller, $action_name)) {
            $this->_action = $action_name = self::NOT_FOUND_ACTION;
        }

        $controller->set_controller($this->_controller);
        $controller->set_action($this->_action);
        $controller->set_parmas($this->_params);
        $controller->$action_name();
    }
}

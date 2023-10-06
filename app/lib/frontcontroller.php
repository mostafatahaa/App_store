<?php

namespace PHPMVC\LIB;

use PHPMVC\LIB\TEMPLATE\Template;

class FrontController
{
    private $_controller    = "index";
    private $_action        = "default";
    private $_params        = [];

    private $_registry;
    private $_template;
    private $_authentication;

    const NOT_FOUND_ACTION = "notFoundAction";
    const NOT_FOUND_CONTROLLER = "PHPMVC\Controllers\\NotFoundController";

    // using dependency injection
    public function __construct(Template $template, Registry $registry, Authentication $auth)
    {
        $this->_template        = $template;
        $this->_registry        = $registry;
        $this->_authentication  = $auth;
        $this->_url();
    }

    private function _url()
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

        // check if the user allowed to access the application
        if (!$this->_authentication->isAuthorized()) {
            $controller_class_name = "PHPMVC\Controllers\AuthController";
            $action_name = "loginAction";
            $this->_controller = "auth";
            $this->_action = "login";
        }

        if (!class_exists($controller_class_name) || !method_exists($controller_class_name, $action_name)) {
            $controller_class_name = self::NOT_FOUND_CONTROLLER;
            $this->_action = $action_name = self::NOT_FOUND_ACTION;
        }
        $controller = new $controller_class_name();
        $controller->set_controller($this->_controller);
        $controller->set_action($this->_action);
        $controller->set_params($this->_params);
        $controller->set_template($this->_template);
        $controller->set_registry($this->_registry);
        $controller->$action_name();
    }
}

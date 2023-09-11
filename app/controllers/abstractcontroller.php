<?php

namespace PHPMVC\Controllers;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;

    public function notFoundAction()
    {
        echo "Sorry this page doesn't exists";
    }

    public function set_controller($controller_name)
    {
        $this->_controller = $controller_name;
    }

    public function set_action($action_name)
    {
        $this->_action = $action_name;
    }

    public function set_parmas($params_name)
    {
        $this->_params = $params_name;
    }
}

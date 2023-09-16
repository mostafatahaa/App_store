<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Front_Controller;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_data = [];

    public function notFoundAction()
    {
        echo $this->_view();
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

    protected function _view()
    {
        if ($this->_action == Front_Controller::NOT_FOUND_ACTION) {
            require_once VIEWS_PATH . "notfound" . DS .  "notfound.view.php ";
        } else {
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . ".view.php ";

            if (file_exists($view)) {
                // this function allowed you to use keys as a variable
                extract($this->_data);
                require_once $view;
                require_once TEMPLATE_PATH . "templateheaderstart.php";
                require_once TEMPLATE_PATH . "templateheaderend.php";
                require_once TEMPLATE_PATH . "wrapperstart.php";
                require_once TEMPLATE_PATH . "header.php";
                require_once TEMPLATE_PATH . "nav.php";
                require_once TEMPLATE_PATH . "wrapperend.php";
                require_once TEMPLATE_PATH . "templatefooter.php";
            } else {
                require_once VIEWS_PATH . "notfound" . DS .  "notview.view.php ";
            }
        }
    }
}

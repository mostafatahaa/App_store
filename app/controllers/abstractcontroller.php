<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Front_Controller;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_template;

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

    public function set_template($template)
    {
        $this->_template = $template;
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
                $this->_template->set_action_view_file($view);
                $this->_template->set_app_data($this->_data);
                $this->_template->render_app();
            } else {
                require_once VIEWS_PATH . "notfound" . DS .  "notview.view.php ";
            }
        }
    }
}

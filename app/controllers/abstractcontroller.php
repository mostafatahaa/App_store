<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Validate;

class AbstractController
{

    use Validate;


    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_template;
    protected $_registry;

    protected $_data = [];


    public function __get($key)
    {
        return $this->_registry->$key;
    }
    public function notFoundAction()
    {
        $this->_view();
    }

    public function set_controller($controller_name)
    {
        $this->_controller = $controller_name;
    }

    public function set_action($action_name)
    {
        $this->_action = $action_name;
    }

    public function set_params($params_name)
    {
        $this->_params = $params_name;
    }

    public function set_template($template)
    {
        $this->_template = $template;
    }
    public function set_registry($registry)
    {
        $this->_registry = $registry;
    }

    protected function _view()
    {
        $view = VIEWS_PATH . $this->_controller . DS . $this->_action . ".view.php ";
        if (!file_exists($view) || $this->_action == FrontController::NOT_FOUND_ACTION) {
            $view = VIEWS_PATH . "notfound" . DS .  "notFound.view.php ";
        }
        $this->_data = array_merge($this->_data, $this->language->get_dictionary());
        $this->_template->set_registry($this->_registry);
        $this->_template->set_action_view_file($view);
        $this->_template->set_app_data($this->_data);
        $this->_template->render_app();
    }
}

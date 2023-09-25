<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UserModel;

class UserController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("employee.default");

        $this->_data["users"] = UserModel::get_all();
        $this->_view();
    }
}

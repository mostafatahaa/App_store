<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UserModel;

class UsersController extends AbstractController
{
    public function defaultAction()
    {
        $this->language->load("template.common");
        $this->language->load("user.default");

        $this->_data["users"] = UserModel::get_all();

        $this->_view();
    }
}

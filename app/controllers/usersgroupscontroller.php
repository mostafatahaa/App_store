<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UserModel;

class UsersGroupsController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("user.default");

        $this->_data["users"] = UserModel::get_all();

        $this->_view();
    }
}

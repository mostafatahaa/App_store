<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UsersGroupModel;;

class UsersGroupController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("usersgroups.default");

        $this->_data["groups"] = UsersGroupModel::get_all();

        $this->_view();
    }
}

<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UsersGroupsModel;;

class UsersGroupsController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("usersgroups.default");

        $this->_data["groups"] = UsersGroupsModel::get_all();

        $this->_view();
    }

    public function createAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("usersgroups.create");
        $this->_language->load("usersgroups.lables");

        $this->_view();
    }
}

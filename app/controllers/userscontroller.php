<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UserModel;
use PHPMVC\Models\UsersGroupsModel;

class UsersController extends AbstractController
{

    private $_createActionRoles =
    [
        "userName"              => 'requireVal|minimum(3)|maximum(12)',
        "password"              => "requireVal|minimum(6)",
        "confirmPassword"       => "requireVal|minimum(6)",
        "email"                 => "requireVal|email",
        "confirmEmail"          => "requireVal|email",
        "phoneNumber"           => "alphaNum|max(15)",
        "groupId"               => "requireVal|int",

    ];

    public function defaultAction()
    {
        $this->language->load("template.common");
        $this->language->load("user.default");

        $this->_data["users"] = UserModel::get_all();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("template.common");
        $this->language->load("user.create");
        $this->language->load("user.labels");
        $this->language->load("validation.errors");

        $this->_data["groups"] = UsersGroupsModel::get_all();
        $this->_view();

        if (isset($_POST["submit"])) {
            $this->isValid($this->_createActionRoles, $_POST);
        }
    }
}

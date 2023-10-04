<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\UserModel;
use PHPMVC\Models\UsersGroupsModel;

class UsersController extends AbstractController
{

    private $_createActionRoles =
    [
        "userName"              => 'requireVal|between(3,12)',
        "password"              => "requireVal|minimum(6)|equalField(confirmPassword)",
        "confirmPassword"       => "requireVal|minimum(6)",
        "email"                 => "requireVal|validateEmail",
        "confirmEmail"          => "requireVal|validateEmail",
        "phoneNumber"           => "alphaNum|maximum(15)",
        "groupId"               => "requireVal|int"

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

        // check both request submit is exists and isValid methods return true
        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            // Create new user
            $user = new UserModel();
        }
        $this->_view();
    }
}

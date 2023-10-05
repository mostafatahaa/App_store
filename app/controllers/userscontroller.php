<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\UserModel;
use PHPMVC\Models\UsersGroupsModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;


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
        $this->language->load("user.messages");
        $this->language->load("validation.errors");

        $this->_data["groups"] = UsersGroupsModel::get_all();

        // check both request submit is exists and isValid methods return true
        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            // Create new user
            $user = new UserModel();
            $user->userName = $this->filter_str($_POST['userName']);
            $user->cryptPassword($_POST['password']);
            $user->email = $this->filter_str($_POST["email"]);
            $user->phoneNumber = $this->filter_str($_POST["phoneNumber"]);
            $user->groupId = $this->filter_int($_POST["groupId"]);
            $user->subscriptionDate = date("Y-m-d");
            $user->lastLogin = date("Y-m-d H:i:s");
            $user->status = 1;
            if ($user->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/users");
        }
        $this->_view();
    }
}

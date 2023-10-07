<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\UserModel;
use PHPMVC\Models\UserProfileModel;
use PHPMVC\Models\UsersGroupsModel;
//TODO:: Create method to check if the email already exists or not.
class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;


    private $_createActionRoles =
    [
        "firstName"             => 'requireVal|alpha|between(3,10)',
        "lastName"              => 'requireVal|alpha|between(3,10)',
        "userName"              => 'requireVal|alphaNum|between(3,12)',
        "password"              => "requireVal|minimum(6)|equalField(confirmPassword)",
        "confirmPassword"       => "requireVal|minimum(6)",
        "email"                 => "requireVal|validateEmail",
        "confirmEmail"          => "requireVal|validateEmail",
        "phoneNumber"           => "alphaNum|maximum(15)",
        "groupId"               => "requireVal|int"

    ];

    private $_editActionRoles =
    [
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

            if (UserModel::userExists($user->userName)) {
                $this->messenger->add($this->language->get("message_user_exists"), Messenger::APP_MESSAGE_ERROR);
                $this->redirect("/users/create");
            }
            if ($user->save()) {
                $userProfile = new UserProfileModel();
                $userProfile->userId = $user->userId;
                $userProfile->firstName = $this->filter_str($_POST["firstName"]);
                $userProfile->LastName = $this->filter_str($_POST["lasttName"]);
                $userProfile->save(false);
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                //NOTE::why this codes doesn't work ?
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/users");
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $user = UserModel::get_by_key($id);
        // if someone put id that is not exists this condiction will redirect user to users page
        if ($user === false) {
            $this->redirect("/users");
        }

        $this->_data['user'] = $user;

        $this->language->load("template.common");
        $this->language->load("user.edit");
        $this->language->load("user.messages");
        $this->language->load("user.labels");
        $this->_data["groups"] = UsersGroupsModel::get_all();

        // check both request submit is exists and isValid methods return true
        if (isset($_POST["submit"]) && $this->isValid($this->_editActionRoles, $_POST)) {
            // edit current user
            $user->phoneNumber = $this->filter_str($_POST["phoneNumber"]);
            $user->groupId = $this->filter_int($_POST["groupId"]);
            if ($user->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                //NOTE::why this codes doesn't work ?
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/users");
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $user = UserModel::get_by_key($id);
        if ($user === false) {
            $this->redirect("/users");
        }
        $this->language->load("user.messages");

        if ($user->delete()) {
            $this->messenger->add($this->language->get("message_delete_success"));
        } else {
            $this->messenger->add($this->language->get("message_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect("/users");
    }

    //TODO::make sure this is a AJAX Request
    // NOTE:: search for the different types of header
    public function checkUserExistsAjaxAction()
    {
        if (isset($_POST["userName"])) {
            header("Content-type: text/plain");
            if (UserModel::userExists($this->filter_str($_POST["userName"]))) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}

<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\SupplierModel;
//TODO:: Create method to check if the email already exists or not.
class SuppliersController extends AbstractController
{
    use InputFilter;
    use Helper;


    private $_createActionRoles =
    [
        "name"                  => 'requireVal|alpha|between(2,40)',
        "email"                 => "requireVal|validateEmail",
        "phoneNumber"           => "alphaNum|maximum(15)",
        "address"               => "requireVal|alphaNum|maximum(40)",

    ];

    public function defaultAction()
    {
        $this->language->load("template.common");
        $this->language->load("suppliers.default");

        $this->_data["suppliers"] = SupplierModel::get_all();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("template.common");
        $this->language->load("suppliers.create");
        $this->language->load("suppliers.labels");
        $this->language->load("suppliers.messages");
        $this->language->load("validation.errors");

        // check both request submit is exists and isValid methods return true
        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            // Create new user
            $supplier = new SupplierModel();
            $supplier->name = $this->filter_str($_POST['name']);
            $supplier->email = $this->filter_str($_POST["email"]);
            $supplier->phoneNumber = $this->filter_str($_POST["phoneNumber"]);
            $supplier->address = $this->filter_str($_POST["address"]);
            if ($supplier->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                //NOTE::why this codes doesn't work ?
                // TODO:: check if the value exists in database and if yes retuurn this message
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/suppliers");
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $supplier = SupplierModel::get_by_key($id);

        /* if someone put id that is not exists this condiction will redirect user to users page
        and if someoen put its id in url it will redirect him to users page because we don't need hime 
        to change his gorup
        */
        if ($supplier === false) {
            $this->redirect("/suppliers");
        }

        $this->_data['supplier'] = $supplier;

        $this->language->load("template.common");
        $this->language->load("suppliers.edit");
        $this->language->load("suppliers.messages");
        $this->language->load("suppliers.labels");

        // check both request submit is exists and isValid methods return true
        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            // edit current user
            $supplier->phoneNumber = $this->filter_str($_POST["phoneNumber"]);
            $supplier->name = $this->filter_str($_POST["name"]);
            $supplier->email = $this->filter_str($_POST["email"]);
            $supplier->address = $this->filter_str($_POST["address"]);
            if ($supplier->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                //NOTE::why this codes doesn't work ?
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/suppliers");
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $supplier = SupplierModel::get_by_key($id);
        // so current user don't delete him self by typing his id in url
        if ($supplier === false) {
            $this->redirect("/suppliers");
        }
        $this->language->load("suppliers.messages");

        if ($supplier->delete()) {
            $this->messenger->add($this->language->get("message_delete_success"));
        } else {
            $this->messenger->add($this->language->get("message_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect("/suppliers");
    }
}

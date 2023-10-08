<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\ProductCategoriesModel;
use PHPMVC\Models\categoryModel;
//TODO:: Create method to check if the email already exists or not.
class ProductCategoriesController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->language->load("template.common");
        $this->language->load("productcategories.default");
        $this->language->load("productcategories.create");
        $this->language->load("productcategories.lables");

        $this->_data["categories"] = ProductCategoriesModel::get_all();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("template.common");
        $this->language->load("productcategories.create");
        $this->language->load("productcategories.default");
        $this->language->load("productcategories.lables");
        $this->language->load("validation.errors");

        //TODO: explane a better solution to check aginst file type
        //TODO: explane a better solution to secure the upload folder
        if (isset($_POST["submit"])) {
            // Create new user
            $category = new ProductCategoriesModel();
            $category->name = $this->filter_str($_POST['name']);
            $category->image = (new FileUpload($_FILES["image"]))->upload()->getFileName();
            if ($category->save()) {
                $this->redirect("/productcategories");
            }
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $category = ProductCategoriesModel::get_by_key($id);

        /* if someone put id that is not exists this condiction will redirect user to users page
        and if someoen put its id in url it will redirect him to users page because we don't need hime 
        to change his gorup
        */
        if ($category === false) {
            $this->redirect("/categorys");
        }

        $this->_data['category'] = $category;

        $this->language->load("template.common");
        $this->language->load("categorys.edit");
        $this->language->load("categorys.messages");
        $this->language->load("categorys.labels");

        // check both request submit is exists and isValid methods return true
        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            // edit current user
            $category->phoneNumber = $this->filter_str($_POST["phoneNumber"]);
            $category->name = $this->filter_str($_POST["name"]);
            $category->email = $this->filter_str($_POST["email"]);
            $category->address = $this->filter_str($_POST["address"]);
            if ($category->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                //NOTE::why this codes doesn't work ?
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/categorys");
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $category = ProductCategoriesModel::get_by_key($id);
        // so current user don't delete him self by typing his id in url
        if ($category === false) {
            $this->redirect("/categorys");
        }
        $this->language->load("categorys.messages");

        if ($category->delete()) {
            $this->messenger->add($this->language->get("message_delete_success"));
        } else {
            $this->messenger->add($this->language->get("message_delete_failed"), Messenger::APP_MESSAGE_ERROR);
        }
        $this->redirect("/categorys");
    }
}

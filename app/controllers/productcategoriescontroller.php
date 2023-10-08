<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\Validate;
use PHPMVC\Models\ProductCategoriesModel;
//TODO:: Create method to check if the email already exists or not.
class ProductCategoriesController extends AbstractController
{
    use Validate;
    use InputFilter;
    use Helper;

    private $_createActionRoles =
    [
        "name"                  => 'requireVal|alphaNum|between(3,30)',
    ];

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
        $this->language->load("productcategories.messages");


        //TODO: explane a better solution to check aginst file type
        //TODO: explane a better solution to secure the upload folder
        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            // Create new user
            $category = new ProductCategoriesModel();
            $category->name = $this->filter_str($_POST['name']);
            $category->image = isset($_FILES['image']) ? (new FileUpload($_FILES["image"]))->upload()->getFileName() : "";
            if ($category->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
                $this->redirect("/productcategories");
            } else {
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $category = ProductCategoriesModel::get_by_key($id);

        if ($category === false) {
            $this->redirect("/productcategories");
        }

        $this->_data['category'] = $category;

        $this->language->load("template.common");
        $this->language->load("productcategories.edit");
        $this->language->load("productcategories.default");
        $this->language->load("productcategories.lables");
        $this->language->load("validation.errors");
        $this->language->load("productcategories.messages");

        if (isset($_POST["submit"]) && $this->isValid($this->_createActionRoles, $_POST)) {
            $category->image = isset($_FILES['image']) ? (new FileUpload($_FILES["image"]))->upload()->getFileName() : "";
            $category->name = $this->filter_str($_POST['name']);
            if ($category->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
            } else {
                $this->messenger->add($this->language->get("message_create_failed"));
            }
            $this->redirect("/productcategories");
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $category = ProductCategoriesModel::get_by_key($id);

        if ($category === false) {
            $this->redirect("/productcategories");
        }
        $this->language->load("productcategories.messages");

        if ($category->delete()) {
            $this->messenger->add($this->language->get("message_delete_success"));
        } else {
            $this->messenger->add($this->language->get("message_delete_failed", Messenger::APP_MESSAGE_ERROR));
        }
        $this->redirect("/productcategories");
    }
}

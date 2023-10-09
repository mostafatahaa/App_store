<?php

namespace PHPMVC\Controllers;

use Exception;
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

        $uploadError = false;
        $this->_data["categories"] = ProductCategoriesModel::get_all();

        //TODO: explane a better solution to check aginst file type
        //TODO: explane a better solution to secure the upload folder
        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {
            $category = new ProductCategoriesModel();
            $category->name = $this->filter_str($_POST['name']);
            $category->image = $_FILES["image"]["name"];
            if (!empty($_FILES['image']['name'])) {
                $uploader = new FileUpload($_FILES['image']);
                try {
                    $uploader->upload();
                    $category->image = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if ($uploadError === false && $category->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
                $this->redirect('/productcategories');
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
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


        $this->language->load("template.common");
        $this->language->load("productcategories.edit");
        $this->language->load("productcategories.default");
        $this->language->load("productcategories.lables");
        $this->language->load("validation.errors");
        $this->language->load("productcategories.messages");

        $this->_data['category'] = $category;
        $uploderError = false;

        if (isset($_POST["submit"])) {
            $category->name = $this->filter_str($_POST['name']);

            if (!empty($_FILES["image"]["name"])) {
                // remove the old image or if the folder is writable
                if ($category->image !== "" && file_exists(IMAGES_UPLOADE_STORAGE . DS . $category->image && is_writable(IMAGES_UPLOADE_STORAGE))) {
                    unlink(IMAGES_UPLOADE_STORAGE . DS . $category->image);
                }

                // create a new image
                $uploader = new FileUpload($_FILES["image"]);
                // for return a message that file destination is not writable
                try {
                    $uploader->upload();
                    $category->image = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploderError = true;
                }
            }

            if ($uploderError === false && $category->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
                $this->redirect("/productcategories");
            } else {
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
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

            if (!empty($category->image) && file_exists(IMAGES_UPLOADE_STORAGE . DS . $category->image)) {
                unlink(IMAGES_UPLOADE_STORAGE . DS . $category->image);
            }

            $this->messenger->add($this->language->get("message_delete_success"));
        } else {
            $this->messenger->add($this->language->get("message_delete_failed", Messenger::APP_MESSAGE_ERROR));
        }
        // remove the old image
        $this->redirect("/productcategories");
    }
}

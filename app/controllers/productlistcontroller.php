<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\FileUpload;
use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\Validate;
use PHPMVC\Models\ProductCategoriesModel;
use PHPMVC\Models\ProductListModel;

//TODO:: Create method to check if the email already exists or not.
class ProductListController extends AbstractController
{
    use Validate;
    use InputFilter;
    use Helper;

    private $_createActionRoles =
    [
        "categoryId"             => 'requireVal|num',
        "name"                   => 'requireVal|alphaNum|between(3,30)',
        "quantity"               => 'requireVal|num',
        "buyPrice"               => 'requireVal|num',
        "sellPrice"              => 'requireVal|num',
        "unit"                   => 'requireVal|num'
    ];

    public function defaultAction()
    {
        // TODO: edit labels and lang files
        $this->language->load("template.common");
        $this->language->load("productlist.default");
        $this->language->load("productlist.lables");
        $this->language->load("productlist.lables");

        $this->_data["products"] = ProductListModel::getAll();



        $this->_view();
    }

    public function createAction()
    {
        $this->language->load("template.common");
        $this->language->load("productlist.create");
        $this->language->load("productlist.default");
        $this->language->load("productlist.lables");
        $this->language->load("productlist.units");
        $this->language->load("productlist.messages");
        $this->language->load("validation.errors");

        $uploadError = false;
        $this->_data["categories"] = ProductCategoriesModel::get_all();


        if (isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {

            $product                = new ProductListModel();
            $product->name          = $this->filter_str($_POST['name']);
            $product->categoryId    = $this->filter_int($_POST['categoryId']);
            $product->quantity      = $this->filter_int($_POST['quantity']);
            $product->buyPrice      = $this->filter_float($_POST['buyPrice']);
            $product->sellPrice     = $this->filter_float($_POST['sellPrice']);
            $product->unit          = $this->filter_int($_POST['unit']);

            if (!empty($_FILES['image']['name'])) {
                $uploader = new FileUpload($_FILES['image']);
                try {
                    $uploader->upload();
                    $product->image = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploadError = true;
                }
            }
            if ($uploadError === false && $product->save()) {
                $this->messenger->add($this->language->get('message_create_success'));
                $this->redirect('/productlist');
            } else {
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $product = ProductListModel::get_by_key($id);

        if ($product === false) {
            $this->redirect("/productlist");
        }


        $this->language->load("template.common");
        $this->language->load("productlist.create");
        $this->language->load("productlist.lables");
        $this->language->load("productlist.units");
        $this->language->load("productlist.messages");
        $this->language->load("validation.errors");

        $this->_data['product'] = $product;
        $this->_data["categories"] = ProductCategoriesModel::get_all();

        $uploderError = false;

        if (isset($_POST["submit"])) {
            $product->name          = $this->filter_str($_POST['name']);
            $product->categoryId    = $this->filter_int($_POST['categoryId']);
            $product->quantity      = $this->filter_int($_POST['quantity']);
            $product->buyPrice      = $this->filter_float($_POST['buyPrice']);
            $product->sellPrice     = $this->filter_float($_POST['sellPrice']);
            $product->unit          = $this->filter_int($_POST['unit']);

            if (!empty($_FILES["image"]["name"])) {
                // remove the old image or if the folder is writable
                if ($product->image !== "" && file_exists(IMAGES_UPLOADE_STORAGE . DS . $product->image && is_writable(IMAGES_UPLOADE_STORAGE))) {
                    unlink(IMAGES_UPLOADE_STORAGE . DS . $product->image);
                }

                // create a new image
                $uploader = new FileUpload($_FILES["image"]);
                // for return a message that file destination is not writable
                try {
                    $uploader->upload();
                    $product->image = $uploader->getFileName();
                } catch (\Exception $e) {
                    $this->messenger->add($e->getMessage(), Messenger::APP_MESSAGE_ERROR);
                    $uploderError = true;
                }
            }

            if ($uploderError === false && $product->save()) {
                $this->messenger->add($this->language->get("message_create_success"));
                $this->redirect("/productlist");
            } else {
                $this->messenger->add($this->language->get("message_create_falied"), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect("/productlist");
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $product = ProductListModel::get_by_key($id);

        if ($product === false) {
            $this->redirect("/productlist");
        }

        $this->language->load("productlist.messages");
        $this->language->load("productlist.default");


        if ($product->delete()) {

            if (!empty($product->image) && file_exists(IMAGES_UPLOADE_STORAGE . DS . $product->image)) {
                unlink(IMAGES_UPLOADE_STORAGE . DS . $product->image);
            }
            $this->messenger->add($this->language->get("message_delete_success"));
        } else {
            $this->messenger->add($this->language->get("message_delete_failed", Messenger::APP_MESSAGE_ERROR));
        }
        // remove the old image
        $this->redirect("/productlist");
    }
}

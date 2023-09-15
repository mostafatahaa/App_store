<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {

        $this->_data["employees"] = EmployeeModel::get_all();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $emp = new EmployeeModel();
            $emp->name        = $this->filter_str($_POST["name"]);
            $emp->email       = $this->filter_str($_POST["email"]);
            $emp->age         = $this->filter_int($_POST["age"]);
            $emp->salary      = $this->filter_float($_POST["salary"]);
            $emp->address     = $this->filter_str($_POST["address"]);
            if ($emp->save()) {
                $_SESSION["message"] = "Employee \"$emp->name\" has bees successflly added";
                $this->redirect('/employee');
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $emp = EmployeeModel::get_by_key($id);
        if ($emp === false) {
            $this->redirect("/employee");
        }

        $this->_data["employee"] = $emp;

        if (isset($_POST["submit"])) {
            $emp->name        = $this->filter_str($_POST["name"]);
            $emp->email       = $this->filter_str($_POST["email"]);
            $emp->age         = $this->filter_int($_POST["age"]);
            $emp->salary      = $this->filter_float($_POST["salary"]);
            $emp->address     = $this->filter_str($_POST["address"]);
            if ($emp->save()) {
                $_SESSION["message"] = "Employee \"$emp->name\" has bees successflly saved";
                $this->redirect('/employee');
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = filter_var($this->_params[0], FILTER_SANITIZE_NUMBER_INT);
        $emp = EmployeeModel::get_by_key($id);

        if (!$emp) {
            $this->redirect("/employee");
        }

        if ($emp->delete()) {
            $_SESSION["message"] = "Employee \"$emp->name\" has bees successflly deleted";
            $this->redirect('/employee');
        }
    }
}

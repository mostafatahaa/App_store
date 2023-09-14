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
            var_dump($emp);
        }
        $this->_view();
    }
}

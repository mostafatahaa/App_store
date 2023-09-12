<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    public function defaultAction()
    {

        $this->_data["employees"] = EmployeeModel::get_all();
        $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST["submit"])) {
            $emp = new EmployeeModel()
        }
        $this->_view();
    }
}

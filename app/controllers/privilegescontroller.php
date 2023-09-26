<?php

namespace PHPMVC\Controllers;

use PHPMVC\Models\PrivilegesModel;;

class PrivilegesController extends AbstractController
{
    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("privileges.default");

        $this->_data["privileges"] = PrivilegesModel::get_all();

        $this->_view();
    }
}

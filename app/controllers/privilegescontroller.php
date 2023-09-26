<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;;

class PrivilegesController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("privileges.default");

        $this->_data["privileges"] = PrivilegesModel::get_all();

        $this->_view();
    }

    public function createAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("privileges.lables");
        $this->_language->load("privileges.create");


        if (isset($_POST["submit"])) {
            $privilege = new PrivilegesModel();
            $privilege->privilegeTitle = $this->filter_str($_POST["privilegeTitle"]);
            $privilege->privilege = $this->filter_str($_POST["privilege"]);

            if ($privilege->save()) {
                $this->redirect("/privileges");
            }
        }

        $this->_view();
    }
}

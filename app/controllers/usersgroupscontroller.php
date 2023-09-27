<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UsersGroupsModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;;

class UsersGroupsController extends AbstractController
{
    use Helper;
    use InputFilter;

    public function defaultAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("usersgroups.default");
        $this->_language->load("usersgroups.lables");


        $this->_data["groups"] = UsersGroupsModel::get_all();

        $this->_view();
    }

    public function createAction()
    {
        $this->_language->load("template.common");
        $this->_language->load("usersgroups.create");
        $this->_language->load("usersgroups.lables");

        $this->_data["privileges"] = PrivilegesModel::get_all();
        if (isset($_POST["submit"])) {
            $group = new UsersGroupsModel();
            $group->groupName = $this->filter_str($_POST["groupName"]);
            var_dump($_POST);
            if ($group->save()) {
                if ($_POST["privileges"] && is_array($_POST["privileges"])) {
                    foreach ($_POST["privileges"] as $privilegeId) {
                        $groupPrivileges = new UsersGroupsPrivilegesModel;
                        $groupPrivileges->groupId = $group->groupId;
                        $groupPrivileges->privilegeId = $privilegeId;
                        $groupPrivileges->save();
                    }
                }
                $this->redirect("/usersgroups");
            }
        }
        $this->_view();
    }
}

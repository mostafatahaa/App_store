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
        $this->language->load("template.common");
        $this->language->load("usersgroups.default");
        $this->language->load("usersgroups.lables");


        $this->_data["groups"] = UsersGroupsModel::get_all();
        $this->_view();
    }

    public function createAction()
    {

        $this->language->load("template.common");
        $this->language->load("usersgroups.create");
        $this->language->load("usersgroups.lables");

        $this->_data["privileges"] = PrivilegesModel::get_all();
        if (isset($_POST["submit"])) {
            $group = new UsersGroupsModel();
            $group->groupName = $this->filter_str($_POST["groupName"]);
            if ($group->save()) {
                if ($_POST["privileges"] && is_array($_POST["privileges"])) {
                    foreach ($_POST["privileges"] as $privilegeId) {
                        $groupPrivilege = new UsersGroupsPrivilegesModel();
                        $groupPrivilege->groupId = $group->groupId;
                        $groupPrivilege->privilegeId = $privilegeId;
                        $groupPrivilege->save();
                    }
                }
                $this->redirect("/usersgroups");
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $group = UsersGroupsModel::get_by_key($id);
        if ($group === false) {
            $this->redirect("/usersgroups");
        }

        $this->language->load("template.common");
        $this->language->load("usersgroups.edit");
        $this->language->load("usersgroups.lables");
        $this->_data["group"] = $group;
        $this->_data["privileges"] = PrivilegesModel::get_all();

        $extract_privileges_id = $this->_data["groupPrivileges"] = UsersGroupsPrivilegesModel::getGroupPrivileges($group);


        if (isset($_POST["submit"])) {
            $group->groupName = $this->filter_str($_POST["groupName"]);

            if ($group->save()) {
                if ($_POST["privileges"] && is_array($_POST["privileges"])) {
                    //NOTE: deleted and added privileges ids without ==> important to understand
                    $privilegeIdsToBeDelete = array_diff($extract_privileges_id, $_POST["privileges"]);
                    $privilegeIdsToBeAded = array_diff($_POST["privileges"], $extract_privileges_id);

                    // Deleted unwanted privileges
                    foreach ($privilegeIdsToBeDelete as $deletePrivilege) {
                        $unwantedPrivileges = UsersGroupsPrivilegesModel::get_by(["privilegeId" => $deletePrivilege, "groupId" => $group->groupId]);
                        $unwantedPrivileges->current()->delete();
                    }

                    // Add new privileges
                    foreach ($privilegeIdsToBeAded as $privilegeId) {
                        $groupPrivileges = new UsersGroupsPrivilegesModel();
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

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $group = UsersGroupsModel::get_by_key($id);

        if ($group === false) {
            $this->redirect("/usersgroups");
        }

        $groupPrivileges = UsersGroupsPrivilegesModel::get_by(["groupId" => $group->groupId]);

        if ($groupPrivileges) {
            foreach ($groupPrivileges as $groupPrivilege) {
                $groupPrivilege->delete();
            }
        }

        if ($group->delete()) {
            $this->redirect("/usersgroups");
        }
    }
}

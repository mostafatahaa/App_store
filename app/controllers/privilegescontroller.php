<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;;

class PrivilegesController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {
        $this->language->load("template.common");
        $this->language->load("privileges.default");

        $this->_data["privileges"] = PrivilegesModel::get_all();

        $this->_view();
    }

    // TODO: you need to implement csrf prevention and know what is it
    public function createAction()
    {
        $this->language->load("template.common");
        $this->language->load("privileges.lables");
        $this->language->load("privileges.create");

        if (isset($_POST["submit"])) {
            $privilege = new PrivilegesModel();
            $privilege->privilegeTitle      = $this->filter_str($_POST["privilegeTitle"]);
            $privilege->privilege           = $this->filter_str($_POST["privilege"]);

            if ($privilege->save()) {
                $this->messenger->add("تم حفظ الصلاحية بنجاح", Messenger::APP_MESSAGE_ERROR);
                $this->redirect("/privileges");
            }
        }

        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $privilege = PrivilegesModel::get_by_key($id);
        if ($privilege === false) {
            $this->redirect("/privileges");
        }

        $this->_data["privilege"] = $privilege;

        $this->language->load("template.common");
        $this->language->load("privileges.lables");
        $this->language->load("privileges.edit");

        if (isset($_POST["submit"])) {
            $privilege->privilegeTitle      = $this->filter_str($_POST["privilegeTitle"]);
            $privilege->privilege           = $this->filter_str($_POST["privilege"]);

            if ($privilege->save()) {
                $this->redirect("/privileges");
            }
        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filter_int($this->_params[0]);
        $privilege = PrivilegesModel::get_by_key($id);

        if ($privilege === false) {
            $this->redirect("/privileges");
        }

        $groupPrivileges = UsersGroupsPrivilegesModel::get_by(["privilegeId" => $privilege->privilegeId]);
        if ($groupPrivileges) {
            foreach ($groupPrivileges as $groupPrivilege) {
                $groupPrivilege->delete();
            }
        }
        if ($privilege->delete()) {
            $this->redirect("/privileges");
        }
    }
}

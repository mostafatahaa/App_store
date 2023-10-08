<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Validate;
use PHPMVC\Models\SupplierModel;
use PHPMVC\Models\UsersGroupsPrivilegesModel;

class TestController extends AbstractController
{
    use Validate;

    public function defaultAction()
    {
        // $privileges = UsersGroupsPrivilegesModel::getPrivilegesForGroup($this->session->u);
        phpinfo();
    }
}

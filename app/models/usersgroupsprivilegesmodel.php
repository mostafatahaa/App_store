<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class UsersGroupsPrivilegesModel extends AbstractModel
{
    public $id;
    public $privilegeId;
    public $groupId;

    protected static $table_name = "app_users_groups_privileges";
    protected static $primary_key = "id";

    protected static $table_schema = [
        "privilegeId"         => self::TYPE_INT,
        "groupId"              => self::TYPE_STR,
    ];
}

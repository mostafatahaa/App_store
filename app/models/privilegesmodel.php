<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class PrivilegesModel extends AbstractModel
{
    public $privilegeId;
    public $privilege;
    public $privilegeTitle;

    protected static $table_name = "app_users_privileges";

    protected static $table_schema = [
        "privilegeId"              => self::TYPE_INT,
        "privilege"                => self::TYPE_STR,
        "privilegeTitle"           => self::TYPE_STR,
    ];

    protected static $primary_key = "privilegeId";
}

<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class PrivilegesModel extends AbstractModel
{
    public $privilegesId;
    public $privileges;

    protected static $table_name = "app_users_privileges";
    protected static $primary_key = "privilegesId";

    protected static $table_schema = [
        "privilegesId"             => self::TYPE_INT,
        "privileges"               => self::TYPE_STR,
    ];
}
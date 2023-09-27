<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class UsersGroupsModel extends AbstractModel
{
    public $groupId;
    public $groupName;

    protected static $table_name = "app_users_groups";
    protected static $primary_key = "groupId";

    protected static $table_schema = [
        "groupId"             => self::TYPE_INT,
        "groupName"           => self::TYPE_STR,
    ];
}

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

    public static function getGroupPrivileges(UsersGroupsModel $group)
    {
        $groupPrivileges = self::get_by(["groupId" => $group->groupId]);

        $extract_privileges_id = [];
        if ($groupPrivileges) {
            foreach ($groupPrivileges as $privilege) {
                $extract_privileges_id[] = $privilege->privilegeId;
            }
        }
        return $extract_privileges_id;
    }
}

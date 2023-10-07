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
        "groupId"             => self::TYPE_INT,
    ];

    public static function getGroupPrivileges(UsersGroupsModel $group)
    {
        $groupPrivileges = self::get_by(["groupId" => $group->groupId]);

        $extract_privileges_id = [];
        if (false !== $groupPrivileges) {
            foreach ($groupPrivileges as $privilege) {
                $extract_privileges_id[] = $privilege->privilegeId;
            }
        }
        return $extract_privileges_id;
    }

    public static function getPrivilegesForGroup($groupId)
    {
        $sql = 'SELECT augp.*, aup.privilege FROM ' . self::$table_name . ' augp';
        $sql .= ' INNER JOIN app_users_privileges aup ON aup.privilegeId = augp.privilegeId';
        $sql .= ' WHERE augp.groupId = ' . $groupId;
        $privileges = self::get($sql);
        $extractedUrls = [];
        if (false !== $privileges) {
            foreach ($privileges as $privilege) {
                $extractedUrls[] = $privilege->privilege;
            }
        }
        return $extractedUrls;
    }
}

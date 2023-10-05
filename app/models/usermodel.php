<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class UserModel extends AbstractModel
{
    public $userId;
    public $userName;
    public $password;
    public $email;
    public $phoneNumber;
    public $subscriptionDate;
    public $lastLogin;
    public $groupId;
    public $status;

    protected static $table_name = "app_users";

    protected static $table_schema = [
        "userId"            => self::TYPE_INT,
        "userName"          => self::TYPE_STR,
        "email"             => self::TYPE_STR,
        "phoneNumber"       => self::TYPE_STR,
        "subscriptionDate"  => self::TYPE_DATE,
        "lastLogin"         => self::TYPE_STR,
        "groupId"           => self::TYPE_INT,
        "status"            => self::TYPE_INT,
        "password"          => self::TYPE_STR,
    ];
    protected static $primary_key = "userId";

    public function cryptPassword($password)
    {

        $salt = '$2a$06$Dnp9Kyu1sxjAvpXuh7XG4i$';
        $this->password = crypt($password, $salt);
    }

    public static function get_all()
    {
        return self::get(
            'SELECT au.*, aug.groupName groupName FROM ' . self::$table_name . ' au INNER JOIN app_users_groups aug ON aug.groupId = au.groupId'
        );
    }
}

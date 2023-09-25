<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class UserModel extends AbstractModel
{
    public $useId;
    public $username;
    public $email;
    public $phoneNumber;
    public $subscriptionDate;
    public $lastLogin;
    public $groupId;

    protected static $table_name = "app_users";
    protected static $primary_key = "userId";

    protected static $table_schema = [
        "useId"             => self::TYPE_INT,
        "username"          => self::TYPE_STR,
        "email"             => self::TYPE_INT,
        "phoneNumber"       => self::TYPE_STR,
        "subscriptionDate"  => self::TYPE_DATE,
        "lastLogin"         => self::TYPE_STR,
        "groupId"           => self::TYPE_INT,
    ];

    public static function get_table_name()
    {
        return self::$table_name;
    }
}

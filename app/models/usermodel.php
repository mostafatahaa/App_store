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
        "subscriptionDate"  => self::TYPE_STR,
        "lastLogin"         => self::TYPE_STR,
        "groupId"           => self::TYPE_INT,
        "status"            => self::TYPE_INT,
        "password"          => self::TYPE_STR,
    ];
    protected static $primary_key = "userId";

    public function cryptPassword($password)
    {
        $this->password = crypt($password, APP_SALT);
    }

    public static function get_all()
    {
        return self::get(
            'SELECT au.*, aug.groupName groupName FROM ' . self::$table_name . ' au INNER JOIN app_users_groups aug ON aug.groupId = au.groupId'
        );
    }

    public static function userExists($userName)
    {
        $foundUser = self::get('SELECT * FROM ' . self::$table_name . ' WHERE userName = "' . $userName . '"');
        return $foundUser ? true : false;
    }

    public static function authenticate($userName, $password, $session)
    {
        $password = crypt($password, APP_SALT);
        $sql = "SELECT * FROM " . static::$table_name . " WHERE userName = '" . $userName . "' AND password = '" . $password . "'";
        $foundUser = self::getOne($sql);
        if ($foundUser) {
            if ($foundUser->status == 2) {
                return 2;
            }
            $foundUser->lastLogin = date('Y-m-d H:i:s');
            $foundUser->save();
            $session->u = $foundUser;
            return 1;
        }
        return false;
    }
}

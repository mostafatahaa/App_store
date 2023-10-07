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

    /**
     * @var UserProfileModel
     */
    public $profile;
    public $privileges;

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

    public static function getUser(UserModel $user)
    {
        return self::get(
            'SELECT au.*, aug.groupName groupName FROM ' . self::$table_name . ' au INNER JOIN app_users_groups aug ON aug.groupId = au.groupId
             WHERE au.userId !=' . $user->userId
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
        // using sub query
        $sql = 'SELECT *, (SELECT groupName FROM app_users_groups WHERE app_users_groups.groupId = ' . self::$table_name . '.groupId) groupName FROM ' . self::$table_name . ' WHERE userName = "' . $userName . '" AND password = "' .  $password . '"';
        $foundUser = self::getOne($sql);
        if ($foundUser) {
            if ($foundUser->status == 2) {
                return 2;
            }
            $foundUser->lastLogin = date('Y-m-d H:i:s');
            $foundUser->save();
            $foundUser->profile = UserProfileModel::get_by_key($foundUser->userId);
            $foundUser->privileges = UsersGroupsPrivilegesModel::getPrivilegesForGroup($foundUser->groupId);
            $session->u = $foundUser;
            return 1;
        }
        return false;
    }
}

<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class UserProfileModel extends AbstractModel
{
    public $userId;
    public $firstName;
    public $LastName;
    public $address;
    public $DOB;
    public $image;

    protected static $table_name = "app_users_profiles";

    protected static $table_schema = [
        "userId"                => self::TYPE_INT,
        "firstName"             => self::TYPE_STR,
        "LastName"              => self::TYPE_STR,
        "address"               => self::TYPE_STR,
        "DOB"                   => self::TYPE_DATE,
        "image"                 => self::TYPE_STR,
    ];
    protected static $primary_key = "userId";
}

<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class ClientsModel extends AbstractModel
{
    public $clientId;
    public $name;
    public $phoneNumber;
    public $email;
    public $address;

    protected static $table_name = "app_clients";
    protected static $primary_key = "clientId";

    protected static $table_schema = [
        "name"          => self::TYPE_STR,
        "phoneNumber"   => self::TYPE_STR,
        "email"         => self::TYPE_STR,
        "address"       => self::TYPE_STR
    ];
}

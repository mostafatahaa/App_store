<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class SupplierModel extends AbstractModel
{
    public $supplierId;
    public $name;
    public $phoneNumber;
    public $email;
    public $address;

    protected static $table_name = "app_suppliers";
    protected static $primary_key = "supplierId";

    protected static $table_schema = [
        "name"          => self::TYPE_STR,
        "phoneNumber"   => self::TYPE_STR,
        "email"         => self::TYPE_STR,
        "address"       => self::TYPE_STR
    ];
}

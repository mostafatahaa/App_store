<?php

namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class EmployeeModel extends AbstractModel
{
    public $id;
    public $name;
    public $email;
    public $age;
    public $salary;
    public $address;

    protected static $table_name = "";
    protected static $primary_key = "userId";

    protected static $table_schema = [
        "name"      => self::TYPE_STR,
        "email"     => self::TYPE_STR,
        "age"       => self::TYPE_INT,
        "salary"    => self::TYPE_DEC,
        "address"   => self::TYPE_STR,
    ];
}

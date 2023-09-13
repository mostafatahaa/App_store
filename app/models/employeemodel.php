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

    protected static $table_name = "employees";
    protected static $primary_key = "id";

    protected static $table_schema = [
        "name"      => self::TYPE_STR,
        "email"     => self::TYPE_STR,
        "age"       => self::TYPE_INT,
        "salary"    => self::TYPE_DEC,
        "address"   => self::TYPE_STR,
    ];

    public static function get_table_name()
    {
        return self::$table_name;
    }
}

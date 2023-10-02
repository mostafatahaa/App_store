<?php

namespace PHPMVC\LIB;
// this object will be used to store all important objects so i can access it easily
class Registry
{

    private static $_instance;

    // we use privat __construct() to make sure that no one can create new Registry
    private function __construct()
    {
    }
    // we use privat __clone() to make sure that no one can take a clone 
    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self(); // self here point to the class name so (new self() = new Registry())
        }
        return self::$_instance;
    }

    public function __set($key, $obj)
    {
        $this->$key = $obj;
    }

    public function __get($key)
    {
        // we use return here to return $key value
        return $this->$key;
    }
}

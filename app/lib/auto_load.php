<?php

namespace PHPMVC\LIB;

class AutoLoad
{
    public static function auto_load($class_name)
    {
        $class_name = str_replace("PHPMVC", "", $class_name);
        $class_name = $class_name . ".php";
        $class_name = strtolower($class_name);


        if (file_exists(APP_PATH . $class_name)) {
            require_once APP_PATH . $class_name;
        }
    }
}

spl_autoload_register(__NAMESPACE__ . "\AutoLoad::auto_load");

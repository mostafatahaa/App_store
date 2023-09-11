<?php
// we use this Because in different OS there is different directory separator.
if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}

// return the absolute path in constant to make it easy when i call it
define("APP_PATH", realpath(dirname(__FILE__)));

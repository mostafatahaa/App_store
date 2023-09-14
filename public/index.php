<?php

namespace PHPMVC;

use PHPMVC\LIB\Front_Controller;

if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}
session_start();
require_once ".." . DS . "app" . DS . "config.php";
require_once APP_PATH . DS . "lib" . DS . "auto_load.php";

$front_controller = new Front_Controller();
echo $front_controller->dispatch();

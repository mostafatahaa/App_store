<?php

namespace PHPMVC;

use PHPMVC\LIB\Front_Controller;

if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}
session_start();
require_once ".." . DS . "app" . DS . "config" . DS . "config.php";
require_once APP_PATH . DS . "lib" . DS . "auto_load.php";
$template_parts = require_once ".." . DS . "app" . DS . "config" . DS . "templateconfig.php";

var_dump($template);

$front_controller = new Front_Controller();
echo $front_controller->dispatch();

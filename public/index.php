<?php

namespace PHPMVC;

use PHPMVC\LIB\Front_Controller;
use PHPMVC\LIB\Template;

if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}

session_start();
require_once ".." . DS . "app" . DS . "config" . DS . "config.php";
require_once APP_PATH . DS . "lib" . DS . "auto_load.php";
$template_parts = require_once ".." . DS . "app" . DS . "config" . DS . "templateconfig.php";


$template = new Template($template_parts);
$front_controller = new Front_Controller($template);
$front_controller->dispatch();

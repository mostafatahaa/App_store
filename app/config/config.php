<?php
if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}

define("APP_PATH", realpath(dirname(__FILE__)) . DS . "..");
define("VIEWS_PATH", APP_PATH . DS . "views" . DS);
define("TEMPLATE_PATH", APP_PATH . DS . "template" . DS);
define("LANGUAGE_PATH", APP_PATH . DS . "languages" . DS);



defined("DATABASE_HOST_NAME")       ? null : define("DATABASE_HOST_NAME", "localhost");
defined("DATABASE_USER_NAME")       ? null : define("DATABASE_USER_NAME", "root");
defined("DATABASE_PASSWORD")        ? null : define("DATABASE_PASSWORD", "");
defined("DATABASE_DB_NAME")         ? null : define("DATABASE_DB_NAME", "storedb");

defined("APP_DEFAULT_LANGUAGE")     ? null : define("APP_DEFAULT_LANGUAGE", "ar");

define("SESSION_SAVE_PATH", dirname(realpath(__FILE__)) . DS . "sessions");

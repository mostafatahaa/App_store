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
defined("CHECK_PRIVILEGE")          ? null : define("CHECK_PRIVILEGE", 1);

define("SESSION_SAVE_PATH", APP_PATH . DS . ".." . DS . "public" . DS . "sessions");

// crypt salt
defined("APP_SALT")         ? null : define("APP_SALT", '$2a$06$Dnp9Kyu1sxjAvpXuh7XG4i$');

// path for uploaded files
defined("UPLOADE_STORAGE")                  ? null     :  define("UPLOADE_STORAGE", APP_PATH . DS . ".." . DS . "public" . DS . "uploads");
defined("IMAGES_UPLOADE_STORAGE")           ? null     :  define("IMAGES_UPLOADE_STORAGE", UPLOADE_STORAGE . DS . "images");
defined("DOCUMENTS_UPLOADE_STORAGE")        ? null     :  define("DOCUMENTS_UPLOADE_STORAGE", UPLOADE_STORAGE . DS . "docs");
defined("MAX_FILE_SIZE_ALLOWED")            ? null     :  define("MAX_FILE_SIZE_ALLOWED", ini_get("upload_max_filesize"));

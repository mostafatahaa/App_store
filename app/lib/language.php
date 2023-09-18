<?php

namespace PHPMVC\LIB;

class Language
{
    private $dictionary = [];

    public function load($path)
    {
        $default_lang = APP_DEFAULT_LANGUAGE;
        if (isset($_SESSION["lang"])) {
            $default_lang = $_SESSION["lang"];
        }
        $path_arr = explode(".", $path);
        $lang_file_load = LANGUAGE_PATH . $default_lang . DS . $path_arr[0] . DS . $path_arr[1] . ".lang.php";
        if (file_exists($lang_file_load)) {
            require $lang_file_load;
            if (is_array($_) && !empty($_)) {
                foreach ($_ as $key => $val) {
                    $this->dictionary[$key] = $val;
                }
            }
        } else {
            trigger_error("sorry the language file $path dosen't exists", E_USER_WARNING);
        }
    }

    public function get_dictionary()
    {
        return $this->dictionary;
    }
}

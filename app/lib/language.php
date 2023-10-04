<?php

namespace PHPMVC\LIB;

class Language
{
    private $dictionary = [];

    // this function will get specific key form my dictionary
    public function get($key)
    {
        if (array_key_exists($key, $this->dictionary)) {
            return $this->dictionary[$key];
        }
    }

    public function feedKey($key, $data)
    {
        if (array_key_exists($key, $this->dictionary)) {
            // added text_erro msg and field name and validationRole to data array
            array_unshift($data, $this->dictionary[$key]);
            return call_user_func_array("sprintf", $data);
        }
    }

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

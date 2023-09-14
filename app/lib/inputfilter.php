<?php

namespace PHPMVC\LIB;

trait InputFilter
{

    public function filter_int($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    public function filter_float($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    public function filter_str($input)
    {
        return htmlentities(strip_tags($input), ENT_QUOTES, "UTF-8");
    }
}

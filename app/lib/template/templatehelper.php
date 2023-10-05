<?php

namespace PHPMVC\LIB\TEMPLATE;

// group of methods used in template class
trait TemplateHelper
{
    public function matchUrl($url)
    {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === $url;
    }

    public function showValue($fieldName, $object = null)
    {
        return isset($_POST[$fieldName]) ? $_POST[$fieldName] : (is_null($object) ? "" : $object->$fieldName);
    }
}

<?php

namespace PHPMVC\LIB\TEMPLATE;

// group of methods used in template class
trait TemplateHelper
{
    // used to match url to make select to the buttom that belong to current page
    public function matchUrl($url)
    {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) === $url;
    }
    // used to show  keep field's valus in case error show 
    public function showValue($fieldName, $object = null)
    {
        return isset($_POST[$fieldName]) ? $_POST[$fieldName] : (is_null($object) ? "" : $object->$fieldName);
    }
    // if fieldName exists and = its current vlaue or object (current user information in object $user) not null and fieldName = its value make select in this field
    public function selectedIf($fieldName, $value, $object = null)
    {
        return ((isset($_POST[$fieldName]) && $_POST[$fieldName] == $value) ||  (!is_null($object) && $object->$fieldName == $value)) ? "selected=selected" : "";
    }

    public function labelFloat($fieldName)
    {
        return isset($_POST[$fieldName]) && !empty($_POST[$fieldName]) ? 'class="floated"' : "";
    }
}

<?php

namespace PHPMVC\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        var_dump($this->_language->load("template.common"));
        $this->_view();
    }
}

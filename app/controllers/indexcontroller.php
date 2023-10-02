<?php

namespace PHPMVC\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->language->load("index.default");
        $this->language->load("template.common");

        $this->_view();
    }
}

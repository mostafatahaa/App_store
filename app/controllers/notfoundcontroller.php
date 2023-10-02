<?php

namespace PHPMVC\Controllers;


class NotFoundController extends AbstractController
{
    public function notFoundAction()
    {

        // $this->$this->_language->load("template.common");
        $this->language->load("template.common");

        $this->_view();
    }
}

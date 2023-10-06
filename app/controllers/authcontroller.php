<?php

namespace PHPMVC\Controllers;

class AuthController extends AbstractController
{
    public function loginAction()
    {
        $this->_template->swapTemplate([":view" => "action_view"]);
        $this->_view();
    }
}

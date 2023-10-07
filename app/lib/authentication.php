<?php

namespace PHPMVC\LIB;

class Authentication
{
    private static $_instance;
    private $_session;

    private $_execludedRoutes = [
        "/index/default",
        "/auth/logout",
        "/users/profiles",
        "/users/changepassword",
        "/users/setting",
        "/language/default",
        "/accessdenied/default",
        "/notfound/notfound"
    ];

    // we use privat __construct() to make sure that no one can create new Authentication
    private function __construct($session)
    {
        $this->_session = $session;
    }
    // we use privat __clone() to make sure that no one can take a clone 
    private function __clone()
    {
    }

    public static function getInstance(SessionManager $session)
    {
        if (self::$_instance === null) {
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }

    public function isAuthorized()
    {
        return isset($this->_session->u);
    }

    public function hasAccess($controller, $action)
    {
        $url = strtolower("/" . $controller . "/" . $action);


        if (in_array($url, $this->_execludedRoutes) || in_array($url, $this->_session->u->privileges)) {
            return true;
        }
    }
}

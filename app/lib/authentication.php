<?php

namespace PHPMVC\LIB;

class Authentication
{
    private static $_instance;
    private $_session;

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
}

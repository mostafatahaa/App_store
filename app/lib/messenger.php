<?php

namespace PHPMVC\LIB;

class Messenger
{
    private static $_instance;

    private $_session;

    private $_messages  = [];

    const APP_MESSAGE_SUCCESS       = 1;
    const APP_MESSAGE_ERROR         = 2;
    const APP_MESSAGE_WARNING       = 3;
    const APP_MESSAGE_INFO          = 4;

    // we use privat __construct() to make sure that no one can create new Registry
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
            self::$_instance = new self($session); // self here point to the class name so (new self() = new Registry())
        }
        return self::$_instance;
    }

    public function add($message, $type = self::APP_MESSAGE_SUCCESS)
    {
        if (!$this->messagesExists()) {
            $this->_session->messages = [];
        }
        $msgs = $this->_session->messages;
        $msgs[] = [$message, $type];
        $this->_session->messages = $msgs;
    }

    private function messagesExists()
    {
        return isset($this->_session->messages);
    }

    public function getMessage()
    {
        if ($this->messagesExists()) {
            $this->_messages = $this->_session->messages;
            unset($this->_session->messages);
            return $this->_messages;
        }
        return [];
    }
}

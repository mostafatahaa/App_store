<?php

namespace PHPMVC\LIB;

class SessionManager
{
    private $sessionName = 'MYAPPSESSION';
    private $sessionMaxLifetime = 0;
    private $sessionSSL = false;
    private $sessionHTTPOnly = true;
    private $sessionPath = "/";
    private $sessionDomain = ".mvcapp2.test";
    private $sessionSavePath = SESSION_SAVE_PATH;

    private $sessionCipherAlgo = "AES-128-ECB";
    private $sessionCipherKey = "WYCRYPT0K3Y@2016";

    private $timeToLive = 30; // time for session to change its id


    public function __construct()
    {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', "files");

        session_name($this->sessionName);
        session_save_path($this->sessionSavePath);
        session_set_cookie_params(
            $this->sessionMaxLifetime,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
    }

    // this magic method invoked when accessing inaccessible or non-existent properties
    // we use this function so if we to call sessions like this (objectName->sessionName)
    // if the session exists it will retunr its value and if not it will return false
    public function __get($key)
    {
        return $_SESSION[$key] !== false ? $_SESSION[$key] : false;
    }

    // this magic method run when writing data that is not exits
    // we use this magic method so if we want to set a new session
    // we will just use (objectname->sessionKey = sessionValue)
    public function __set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    // this magic method called when we use isset() function
    public function __isset($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    public function start()
    {
        if (session_id() === "") {
            if (session_start()) {
                $this->setSessionStartTime();
                $this->isSessionValidity();
            }
        }
    }

    private function setSessionStartTime()
    {
        if (!isset($this->sessionStartTime)) {
            $this->sessionStartTime = time();
        }
        return true;
    }

    private function isSessionValidity()
    {
        if ((time() - $this->sessionStartTime) > ($this->timeToLive * 60)) {
            $this->renewSession();
        }
        return true;
    }

    private function renewSession()
    {
        $this->sessionStartTime = time();
        return session_regenerate_id(true);
    }
}

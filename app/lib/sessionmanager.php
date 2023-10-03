<?php

namespace PHPMVC\LIB;

use SessionHandler;

class SessionManager extends SessionHandler
{
    private $sessionName = 'MYAPPSESSION';
    private $sessionMaxLifetime = 0;
    private $sessionSSL = false;
    private $sessionHTTPOnly = true;
    private $sessionPath = "/";
    private $sessionDomain = ".mvcapp.localhost";
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
        session_set_save_handler($this, true);
    }

    public function __unset($key)
    {
        unset($_SESSION[$key]);
    }

    public function read($id)
    {
        $data = parent::read($id);
        if (empty($data)) {
            // Log an error or throw an exception
            return "";
        }
        $decrypted_data = openssl_decrypt($data, $this->sessionCipherAlgo, $this->sessionCipherKey);
        return ($decrypted_data === false) ? "" : $decrypted_data;
    }

    public function write($id, $data)
    {
        return parent::write($id, openssl_encrypt($data, $this->sessionCipherAlgo, $this->sessionCipherKey));
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
                $this->checkSessionValidity();
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

    private function checkSessionValidity()
    {
        if ((time() - $this->sessionStartTime) > ($this->timeToLive * 60)) {
            $this->renewSession();
            // we use this here so when session id changes
            // fingerPrint store the new session i
            $this->isValidFingerPrint();
        }
        return true;
    }

    private function renewSession()
    {
        $this->sessionStartTime = time();
        return session_regenerate_id(true);
    }

    // function kill session
    public function kill()
    {
        session_unset(); // we use this tom free app for all exists session variables
        // delete cookie
        setcookie(
            $this->sessionName,
            "",
            time() - 1000,
            $this->sessionPath,
            $this->sessionDomain,
            $this->sessionSSL,
            $this->sessionHTTPOnly
        );
        session_destroy();
    }

    private function generateFingerPrint()
    {
        $userAgentId = $_SERVER["HTTP_USER_AGENT"];
        $this->cipherKey = random_bytes(20);
        $sessionId = session_id();
        $this->fingerPrint = md5($userAgentId . $this->cipherKey . $sessionId);
    }

    // we use this function to secure the sessions and make sure
    // that the same client is the one who is useing the app.
    // for example if any hacker create a cookie from his device to access in user
    // her cookie will kill because i set HTTP_USER_AGENT and sessionId and random number
    public function isValidFingerPrint()
    {
        if (!isset($this->fingerPrint)) {
            $this->generateFingerPrint();
        }

        $fingerPrint = md5($_SERVER["HTTP_USER_AGENT"] . $this->cipherKey . session_id());
        if ($fingerPrint === $this->fingerPrint) {
            return true;
        }
        return false;
    }
}




// $sessions = new SessionManager();
// $sessions->start();
// if (!$sessions->isValidFingerPrint()) {
//     $sessions->kill();
// };

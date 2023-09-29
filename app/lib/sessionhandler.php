<?php

define("SESSION_SAVE_PATH", dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . "sessions");

class AppSessionHandler extends SessionHandler
{
    private $seeeionName = 'MYAPPSESSION';
    private $sessionMaxLifetime = 0;        // this means session will end when you close your browser
    private $sessionSSL = false;
    private $sessionHTTPOnly = true;        // this means the cooke cannot be accessd through the client-side-script (javascript)
    private $sessionPath = "/";
    private $sessionDomain = ".test.com";   // this mean for any subdomain
    private $sessionSavePath = SESSION_SAVE_PATH;

    private $sessionCipherAlgo = MCRYPT_BLOWFISH;
    private $sessionCipherMode = MCRYPT_MODE_ECB;
    private $sessionCipherKey = "WQAS201VXZP@221";

    /*
When use_only_cookies is disable, php will pass the sessionID via URL
this makes the aplication more vulnerable to session hijacking attackes
so we make it true to make php send session IDS in cookies
*/
    public function __construct()
    {
        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_trans_sid', 0);
        ini_set('session.save_handler', "files");
    }
}

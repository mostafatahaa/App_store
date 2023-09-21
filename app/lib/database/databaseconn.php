<?php

namespace PHPMVC\LIB\Database;

class DatabaseConn
{
    private static $host_name = DATABASE_HOST_NAME;
    private static $db_name = DATABASE_DB_NAME;
    private static $pass = DATABASE_PASSWORD;
    private static $user = DATABASE_USER_NAME;
    public  static $pdo;


    public static function connect_db()
    {

        if (!isset(self::$pdo)) {

            $dsn = "mysql://hostname=" . self::$host_name . ";dbname=" . self::$db_name;
            try {
                self::$pdo = new \PDO($dsn, self::$user, self::$pass);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo "failed connection";
            }
        }
        return self::$pdo;
    }
}

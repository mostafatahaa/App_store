<?php

namespace PHPMVC\LIB\Database;

class DatabaseConn
{
    private static $host_name = "localhost";
    private static $db_name = "new_employees";
    private static $pass = "";
    private static $user = "root";
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

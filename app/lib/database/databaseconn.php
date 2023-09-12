<?php

namespace PHPMVC\LIB\Database;

class DatabaseConn
{
    public static function connect_db()
    {
        $pdo = null;
        $dsn = "mysql://hostname=localhost;dbname=new_employees";
        try {
            $pdo = new \PDO($dsn, "root", "");
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
        return $pdo;
    }
}

<?php

namespace PHPMVC\LIB\Database;

class DatabaseConn
{
    private $host_name = "localhost";
    private $db_name = "new_employees";
    private $pass = "";
    private $user = "root";


    public function connect()
    {

        $dsn = "mysql://hostname=" . "$this->host_name" . ";dbname=" . $this->db_name;
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "failed connection";
        }
        return $pdo;
    }
}

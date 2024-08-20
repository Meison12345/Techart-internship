<?php

namespace App\Models;

use PDO;

class DataBase
{
    private const HOST = 'localhost';
    private const DBNAME = 'student';
    private const USERNAME = 'root';
    private const PASSWORD = 'root';
    private static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {
            $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME;
            self::$pdo = new PDO($dsn, self::USERNAME, self::PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

    public static function closeConnection()
    {
        if (self::$pdo !== null) {
            self::$pdo = null;
        }
    }
}

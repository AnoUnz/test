<?php
namespace App\Core;

use PDO;
use PDOException;

class Model {
    protected static $db;

    public function __construct() {
        if (!self::$db) {
            $cfg = require __DIR__ . '/../../config/database.php';
            $dsn = "mysql:host={$cfg['host']};dbname={$cfg['name']};charset={$cfg['charset']}";
            self::$db = new PDO($dsn, $cfg['user'], $cfg['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
    }

    protected function db() {
        return self::$db;
    }
}

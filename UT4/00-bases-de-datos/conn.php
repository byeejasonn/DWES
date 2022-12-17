<?php

namespace Connection;

use \PDO;

class Connection {
    private static $conn;
    private static $instance;
    private const DSN = 'mysql:host=localhost;dbname=dwes';
    private const USER = 'byeejasonn';
    private const PASSWD = '1234';
    private const OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    public static function singleton() {
        if(!isset($instance)) {
            self::$instance = new Connection();
        } 

        return self::$instance;
    }

    private function __construct() {
        try {

            self::$conn = new PDO(self::DSN, self::USER, self::PASSWD, self::OPTIONS);
        
        } catch (\PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "\n";
            die();
        }
    }

    public static function getConn() {
        return self::$conn;
    }
}
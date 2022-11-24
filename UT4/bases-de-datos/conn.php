<?php

namespace Connection;

use \PDO;

class Connection {
    private $conn;
    private static $instance;

    public static function singleton() {
        if(!isset($instance)) {
            self::$instance = new Connection();
        } 

        return self::$instance;
    }

    private function __construct() {
        try {
            $dsn = 'mysql:host=localhost;dbname=dwes';
            $user = 'byeejasonn';
            $passwd = '1234';
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
        
            $this->conn = new PDO($dsn, $user, $passwd, $options);
        
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "\n";
            die();
        }
    }

    public function getConn() {
        return $this->conn;
    }
}
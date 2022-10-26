<?php

class Config {
    
    private $nombre;
    private static $instance;

    private function __construct(string $nombre = '') {
        $this->nombre = $nombre;
    }

    static function singleton() {
        if(!isset(self::$instance)) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

    function getnombre() {
        return $this->nombre;
    }
}
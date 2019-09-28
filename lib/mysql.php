<?php
    class MySQL {
        private static $instance = NULL;
        private function __construct() {}
        private function __clone() {}
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = mysqli_connect("127.0.0.1", "root", "123456", "projecteuler");
            }
            return self::$instance;
        }
        
    }

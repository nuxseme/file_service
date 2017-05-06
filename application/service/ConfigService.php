<?php

class ConfigService
{
    private static  $instance = null;
    private function __construct(){}
    private function __clone() {}
    public static function getInstance()
    {
        if(is_null ( self::$instance ) || !isset ( self::$instance )) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function get($key)
    {
        $config = require_once(__DIR__ . '/../config/params.php');
        return isset($config[$key]) ? $config[$key] : null;
    }
}
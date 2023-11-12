<?php

namespace App\Helpers;

class SessionFlash
{
    protected static $instance;

    protected function __construct()
    {
//        session_start();
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function with($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        $value = $_SESSION[$key] ?? null;
//        unset($_SESSION[$key]);
        return $value;
    }
}
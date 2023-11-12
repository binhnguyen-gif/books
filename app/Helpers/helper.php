<?php

use App\Helpers\SessionFlash;

if (!function_exists('getCurrentUrl')) {
    function getCurrentUrl()
    {
        return "http".(isset($_SERVER['HTTPS']) ? "s" : "")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
}

if (!function_exists('route')) {
    function route()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];

        return "$protocol://$host/";
    }
}

if (!function_exists('print_pre')) {
    function print_pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('redirect')) {
    function redirect($url)
    {
        header("Location: $url");
        exit();
    }
}

if (!function_exists('with')) {
    function with($key, $value): void
    {
        SessionFlash::getInstance()->with($key, $value);
    }
}

if (!function_exists('session')) {
    function session($key)
    {
        return SessionFlash::getInstance()->get($key);
    }
}

if (!function_exists('unsession')) {
    function unsession($key)
    {
        unset($_SESSION[$key]);
    }
}

if (!function_exists('checkLogin')) {
    function checkLogin()
    {
        $user = $_SESSION['customer'] ?? null;
        if ($user) {
            return true;
        }
        return false;
    }
}

if (!function_exists('customer')) {
    function customer()
    {
        return $_SESSION['customer'] ?? null;
    }
}

if (!function_exists('test')) {
    function test()
    {
        var_dump('vao');
        die();
    }
}

if (!function_exists('checkMethod')) {
    function checkMethod($method)
    {
        return $_SERVER['REQUEST_METHOD'] === $method;
    }
}





<?php

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
    function redirect($url) {
        header("Location: $url");
        exit();
    }
}



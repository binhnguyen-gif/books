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
        $currentUrl = "http".(isset($_SERVER['HTTPS']) ? "s" : "")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        $route = dirname($currentUrl).'/';
        return $route;
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



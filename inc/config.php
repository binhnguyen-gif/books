<?php
session_start();
$title = "Website bán sách";

spl_autoload_register(function ($className) {
    if (is_file('./Controllers/' . $className . '.php')) {
        require_once ('./Controllers/' . $className . '.php');
    } else if (is_file('./Model/' . $className . '.php')) {
        require_once ('./Model/' . $className . '.php');
    } else if (is_file('./View/' . $className . '.php')) {
        require_once ('./View/' . $className . '.php');
    } else if (is_file('./helpers/' . $className . '.php')) {
        require_once ('./helpers/' . $className . '.php');
    }
});

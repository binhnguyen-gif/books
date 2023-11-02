<?php
$title = "Some Web Site";


spl_autoload_register(function ($className) {
    if (is_file('./Controller/' . $className . '.php')) {
        require('./Controller/' . $className . '.php');
    } else if (is_file('./Model/' . $className . '.php')) {
        require('./Model/' . $className . '.php');
    } else if (is_file('./inc/' . $className . '.php')) {
        require_once('./inc/' . $className . '.php');
    }
});

$page = null;
if(isset($_GET['action'])) {
    $page = $_GET['action'];
}


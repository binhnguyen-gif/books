<?php

namespace App\Controllers;

class LoginController
{

    public function __construct($view = null)
    {
        $this->model = new User();
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->model->login($username, $password)) {
            $_SESSION['user'] = $username;
            $loc = $_SERVER['HTTP_HOST'].'/'.$_SERVER['PHP_SELF'].'';
            header("Location: http://$loc");
            exit();
        } else {
            echo 'Sai tài khoản hoặc mật khẩu';
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $loc = $_SERVER['HTTP_HOST'].'/'.$_SERVER['PHP_SELF'].'';
        header("Location: http://$loc");
        exit();
    }
}

?>

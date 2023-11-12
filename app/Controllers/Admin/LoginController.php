<?php

namespace App\Controllers\Admin;

use App\Controllers\Auth;
use App\Controllers\Controller;
use \App\Models\User;

class LoginController extends  Controller
{
    public function login()
    {
        $username = $_POST['username'];
//        $password = md5($_POST['password']);
        $password = $_POST['password'];

        $user = new User();
        $credentials = $user->login($username, $password);

        if (!empty($credentials)) {
            $_SESSION['user']['id'] = $credentials['id'];
            $_SESSION['user']['username'] = $credentials['username'];
            redirect(route());
        } else {
            echo 'Sai tài khoản hoặc mật khẩu';
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return redirect(route());
    }
}

?>

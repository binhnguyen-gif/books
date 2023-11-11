<?php

namespace App\Controllers\Auth;

use App\Controllers\Auth;
use App\Controllers\Controller;
use \App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        $info['username'] = $_POST['username'];
        $info['email'] = $_POST['email'];
        $info['password'] = md5($_POST['password']);
        $info['phone'] = $_POST['phone'];
        $info['address'] = $_POST['address'];
        $info['role'] = 0;

        $user = new User();
        $credentials = $user->create($info);

        if (!empty($credentials)) {
            $_SESSION['user']['id'] = $credentials['id'];
            $_SESSION['user']['username'] = $credentials['username'];
            redirect(route());
        } else {
            echo 'Đăng ký thất bại';
        }
    }


}

?>

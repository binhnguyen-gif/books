<?php

namespace App\Controllers\Admin;

use App\Controllers\Auth;
use App\Controllers\Controller;
use App\Helpers\CustomSession;
use \App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        if (checkMethod('POST') && isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $user = new User();
            $credentials = $user->login($username, $password);

            if (!empty($credentials)) {
                $_SESSION['user'] = $credentials;
                redirect(customRoute('admin'));
            } else {
                CustomSession::put('warning', 'Sai thông tin tài khoản hoặc mật khẩu');
            }
        }

        back();
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return redirect(route());
    }
}

?>

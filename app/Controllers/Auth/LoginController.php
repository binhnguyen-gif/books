<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Helpers\SessionFlash;
use App\Models\Customer;

class LoginController extends Controller
{
    public function login()
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $user = new Customer();
        $credentials = $user->login($email, $password);
        if (!empty($credentials)) {
            unset($credentials['password']);
            $_SESSION['customer'] = $credentials;
            CustomSession::put('info', 'Đăng nhập thành công');
            redirect(route());
        } else {
            CustomSession::put('warning', 'Tài khoản hoặc mật khẩu không chính xác');
            redirect(route());
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['customer']);
        redirect(route());
    }
}


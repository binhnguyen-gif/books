<?php

namespace App\Controllers\Auth;

use App\Controllers\Auth;
use App\Controllers\Controller;
use App\Models\Customer;
use App\Service\SendMail;

class RegisterController extends Controller
{
    public function register()
    {
        $info['username'] = $_POST['username'];
        $info['email'] = $_POST['email'];
        $info['password'] = md5($_POST['password']);
        $info['phone'] = $_POST['phone'];
        $info['address'] = $_POST['address'];
//        $info['role'] = 0;

        $user = new Customer();
        $credentials = $user->create($info);
        $yourmail = new SendMail();
        $yourmail->send("info@destination.com", "Destination Name", "Mail Subject", "<p>HTML Content</p>");
        if (!empty($credentials)) {
            unset($credentials['password']);
            $_SESSION['customer'] = $credentials;
            redirect(route());
        } else {
            echo 'Đăng ký thất bại';
        }
    }


}

?>

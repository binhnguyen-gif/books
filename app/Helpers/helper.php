<?php

use App\Helpers\SessionFlash;
use App\Helpers\CustomSession;
use App\View;

if (!function_exists('customRoute')) {
    function customRoute($param): string
    {
        return route().$param;
    }
}

if (!function_exists('back')) {
    function back()
    {
        $previousPage = $_SERVER['HTTP_REFERER'];

        header("Location: $previousPage");
        exit();
    }
}

if (!function_exists('route')) {
    function route(): string
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];

        return "$protocol://$host/";
    }
}

if (!function_exists('print_pre')) {
    function print_pre($data): void
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('redirect')) {
    function redirect($url)
    {
        error_reporting(E_ALL);
        echo 'This is an error';
//        var_dump($url);die();
        if (!headers_sent()) {
//            header("Location: $url");
            header('Location: '.$url, true, 302);
            exit();
        } else {
            // Xử lý khi header đã được gửi
            echo "Headers have already been sent.";
        }
    }
}

if (!function_exists('with')) {
    function with($key, $value): void
    {
        SessionFlash::getInstance()->with($key, $value);
    }
}

if (!function_exists('session')) {
    function session($key)
    {
        return SessionFlash::getInstance()->get($key);
    }
}

if (!function_exists('unsession')) {
    function unsession($key): void
    {
        unset($_SESSION[$key]);
    }
}

if (!function_exists('checkLogin')) {
    function checkLogin(): bool
    {
        $user = $_SESSION['customer'] ?? null;
        if ($user) {
            return true;
        }
        return false;
    }
}

if (!function_exists('customer')) {
    function customer()
    {
        return $_SESSION['customer'] ?? null;
    }
}

if (!function_exists('test')) {
    function test()
    {
        var_dump('vao');
        die();
    }
}

if (!function_exists('checkMethod')) {
    function checkMethod($method): bool
    {
        return $_SERVER['REQUEST_METHOD'] === $method;
    }
}

if (!function_exists('put')) {
    function put($key, $value): void
    {
        CustomSession::put($key, $value);
    }
}

if (!function_exists('get')) {
    function get($key): string
    {
        return CustomSession::get($key);
    }
}

if (!function_exists('has')) {
    function has($key): bool
    {
        return CustomSession::has($key);
    }
}

if (!function_exists('forget')) {
    function forget($key): void
    {
        CustomSession::forget($key);
    }
}

if (!function_exists('customToaster')) {
    function customToaster($key): void
    {
        if (has($key)) {
            $value = get($key);
//            var_dump('test: '.$value);
            echo "showToast('{$key}', '{$value}')";
            forget($key);
        }
    }
}

if (!function_exists('userAdmin')) {
    function userAdmin(): void
    {
        if (!isset($_SESSION['user'])) {
            redirect(customRoute('login'));
            exit();
        }
    }
}

if (!function_exists('checkAdmin')) {
    function checkAdmin(): bool
    {
        if (!isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }
}

if (!function_exists('listCategories')) {
    function listCategories(): array
    {
        return (new \App\Models\Category())->getAll();
    }
}

if (!function_exists('listPublish')) {
    function listPublish(): array
    {
        return (new \App\Models\Publish())->getAll();
    }
}

if (!function_exists('file_name')) {
    function file_name($image): string
    {
        return strtotime(date('Y-m-d')). '_' . $_FILES["{$image}"]["name"];
    }
}

if (!function_exists('check_upload')) {
    function check_upload($image): bool
    {
        return isset($_FILES["{$image}"]);
    }
}

if (!function_exists('create_slug')) {
    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}



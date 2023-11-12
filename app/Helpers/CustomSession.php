<?php

namespace App\Helpers;
class CustomSession
{
    // Khởi tạo session
    public static function start(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Lưu giá trị vào session
    public static function put($key, $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    // Lấy giá trị từ session
    public static function get($key, $default = null)
    {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    // Kiểm tra xem một key có tồn tại trong session hay không
    public static function has($key): bool
    {
        self::start();
        return isset($_SESSION[$key]);
    }

    // Xóa một key khỏi session
    public static function forget($key): void
    {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    // Xóa toàn bộ session
    public static function flush(): void
    {
        self::start();
        session_destroy();
    }
}
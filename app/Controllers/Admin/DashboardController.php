<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\View;

class DashboardController
{
    public function __construct()
    {
//        checkAdmin();
    }

    public function index(): View
    {
//        checkAdmin();
        return View::make('backend/admin');
    }

    public function login(): View
    {
        return View::make('backend/login');
    }

}

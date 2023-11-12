<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\View;

class DashboardController
{
    public function index(): View
    {
        if(!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }

        return View::make('backend/admin');
    }

    public function login(): View
    {
        return View::make('backend/login');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect(customRoute('admin/login'));
    }

}

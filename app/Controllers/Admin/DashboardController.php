<?php

declare(strict_types = 1);

namespace App\Controllers\Admin;

use App\View;

class DashboardController
{
    public function index(): View
    {
        return View::make('backend/admin');
    }
}

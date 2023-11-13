<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\View;

class DashboardController
{
    public function index(): View
    {
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }

        $totalBookForSale = (new Book())->count(['status' => Book::ACTIVATED])['total'];
        $totalCustomer = (new Customer())->count()['total'];
        $totalOrderSold = (new Order())->count()['total'];
        $totalCategory = (new Category())->count()['total'];

        return View::make('backend/admin',
            [
                'totalBookForSale' => $totalBookForSale,
                'totalCustomer' => $totalCustomer,
                'totalOrderSold' => $totalOrderSold,
                'totalCategory' => $totalCategory
            ]
        );
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

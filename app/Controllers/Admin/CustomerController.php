<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Customer;
use App\View;


class CustomerController extends Controller
{

    public function __construct()
    {
        if(!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }
    public function list(): View
    {
        $customers = (new Customer())->getAll();
        return View::make('backend/customer/index', ['customers' => $customers]);
    }

    public function show(): View
    {
        try {
            $id = $_GET['customer_id'];
            $book = (new Customer())->getById($id);
            return View::make('backend/customer/create_update', ['customer' => $customer]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function delete()
    {
        try {
            $customer_id = $_GET['customer_id'];
            $customer= (new Customer())->getById($customer_id);
            $result = (new Customer())->delete($customer_id);
            if ($result) {
                CustomSession::put('success', 'Xóa thành công');
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi xóa customer');
        }

        back();
    }

}


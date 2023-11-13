<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Order;
use App\Models\OrderDetail;
use App\View;


class OrderController extends Controller
{
    public function __construct()
    {
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }

    public function list(): View
    {
        $orders = (new Order())->getAll();
        return View::make('backend/order/index', ['orders' => $orders]);
    }

    public function create(): View
    {
        return View::make('backend/order/create_update');
    }

    public function show(): View
    {
        try {
            $order_id = $_GET['order_id'];
            $order = (new Order())->getById($order_id);
            $orderDetails = (new OrderDetail())->getOrderDetailsByCustomer($order_id);
            return View::make('backend/order/order_detail', ['orderDetails' => $orderDetails, 'order' => $order]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function status()
    {
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }

        try {
            if (checkMethod('POST') && isset($_POST['updateOrderStatus'])) {
                $id = $_POST['order_id'];
                $status = ['status' => $_POST['status'] ?? 0];
                $upOrder = (new Order())->update($id, $status);
                if ($upOrder) {
                    CustomSession::put('success', 'Cập nhật trạng thái đơn hàng thành công');
                    back();
                }
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi book');
            back();
        }
    }

    public function delete()
    {
    }
}


<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use App\View;

class OrderController extends Controller
{
    public function store()
    {
        $customer_id = $_SESSION['customer']['id'] ?? null;

        if (!$customer_id) {
            with('msg', 'Bạn cần đăng nhập thể thực hiện đặt hàng');
            redirect(route());
        }

        try {
            if (checkMethod('POST') && isset($_POST['order'])) {
                $order = [
                    'username' => $_POST['username'] ?? '',
                    'user_id' => Order::STAFF,
                    'customer_id' => $customer_id,
                    'phone' => $_POST['phone'] ?? '',
                    'address' => $_POST['address'] ?? '',
                    'note' => $_POST['note'] ?? '',
                    'payment_type' => $_POST['payment_type'] ?? 0,
                    'booking_date' => date('Y-m-d H:i:s'),
                ];

                $this->placeOrder($order, $customer_id);
                with('msg', 'Đặt hàng thành công');
            }
        } catch (\Exception $e) {
            echo 'Lỗi: '.$e->getMessage().' Line:'.$e->getLine();
            return View::make('errors/503');
        }
        redirect(route());
    }

    private function placeOrder($order, $customer_id)
    {
        $cart = (new Cart())->getCartByCustomer($customer_id);
        $amount = (new Cart())->getAmount($customer_id);

        if (!empty($cart)) {
            $order['total_price'] = $amount['amount'];
            $newOrder = (new Order())->create($order);

            foreach ($cart as $product) {
                $newOrderDetail = [
                    'order_id' => $newOrder['id'],
                    'book_id' => $product['book_id'],
                    'quantity' => $product['quantity'],
                    'total_price' => $product['total']
                ];
                (new OrderDetail())->create($newOrderDetail);
            }

            if ($order['payment_type'] == 1) {
                $data_url = VNPay::vnpay_create_payment([
                    'vnp_TxnRef' => $newOrder['id'],
                    'vnp_OrderInfo' => "Mã đơn hàng: # {$newOrder['id']}",
                    'vnp_Amount' => $order['total_price'],
                ]);

                redirect($data_url);
            }

            (new Cart())->deleteCart($customer_id);
        }
    }

    public function vnPayCheck()
    {
        $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
        $vnp_TxnRef = $_GET['vnp_TxnRef'];
        $vnp_Amount = $_GET['vnp_Amount'];
        $customer_id = $_SESSION['customer']['id'] ?? null;

        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 0) {
                $orderNew = (new Order())->getById($vnp_TxnRef);
                (new Order())->update($orderNew['id'], ['payment_status' => Order::PAID, 'status' => Order::PREPARE]);

                redirect(route());
            } elseif ($vnp_ResponseCode == 24) {
                (new Order())->delete($vnp_TxnRef);
                (new Cart())->deleteCart($customer_id);
                redirect(route());
            } else {
                (new Order())->delete($vnp_TxnRef);
                (new Cart())->deleteCart($customer_id);
                redirect(route());
            }
        }
    }


}


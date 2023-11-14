<?php

namespace App\Controllers;

use App\Helpers\CustomSession;
use App\Models\Book;
use App\Models\Cart;
use App\View;

class CartController extends Controller
{

    public function __construct()
    {
        if (!checkLogin()) {
            CustomSession::put('info', 'Bạn cần đăng nhập thể thực hiện thêm sản phẩm vào giỏ hàng');
            redirect(route());
        }
    }

    public function index()
    {
        $customer_id = $_SESSION['customer']['id'];
        $books = (new Cart())->getCartByCustomer($customer_id);

        return View::make('cart', ['books' => $books]);
    }

    public function addCart()
    {
        $book_id = $_POST['book_id'] ?? null;
        $customer_id = $_SESSION['customer']['id'] ?? null;

        try {
            $upCart = false;
            if (isset($_POST['addCart']) && $customer_id) {
                $book = (new Book())->getById($book_id);
                $cart = (new Cart())->getCart($book_id, $customer_id);
                if (!empty($cart)) {
                    $quantity = $cart['quantity'] + 1;
                    (new Cart())->update($cart['id'], ['quantity' => $quantity, 'total' => $quantity * $book['price']]);
                    CustomSession::put('info', 'Đã thêm sản phẩm vào giỏ hàng');
                } else {
                    $cart = [
                        'book_id' => $book['id'],
                        'customer_id' => $customer_id,
                        'quantity' => 1,
                        'total' => $book['price']
                    ];

                    $upCart = (new Cart())->insert($cart);
                    CustomSession::put('info', 'Đã thêm sản phẩm vào giỏ hàng');
                }
            }
        } catch (\Exception $e) {
            var_dump('Lỗi: '.$e->getMessage().' Line:'.$e->getLine());die();
            redirect(route());
        }

        redirect(route());

    }

    public function delete()
    {
        try {
            $book_id = $_POST['book_id'] ?? null;
            $customer_id = $_SESSION['customer']['id'] ?? null;
            $cart = (new Cart())->getCart($book_id, $customer_id);

            if ($cart) {
                (new Cart())->delete($cart['id']);
            }
        } catch (\Exception $e) {
            echo 'Lỗi: '.$e->getMessage().' Line:'.$e->getLine();
            exit();
        }

        back();
    }
}
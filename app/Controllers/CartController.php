<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\View;

class CartController extends Controller
{
    public function index()
    {
        if (!checkLogin()) {
            with('msg', 'Bạn cần đăng nhập thể thực hiện thêm sản phẩm vào giỏ hàng');
            redirect(route());
        }

        $customer_id = $_SESSION['customer']['id'];
        $books = (new Cart())->getCartByCustomer($customer_id);
//        print_pre($books);die();

        return View::make('cart', ['books' => $books]);
    }

    public function addCart()
    {
        $book_id = $_POST['book_id'] ?? null;
        $customer_id = $_SESSION['customer']['id'] ?? null;

        try {
            if (isset($_POST['addCart']) && $customer_id) {
                $book = (new Book())->getById($book_id);
                $cart = (new Cart())->getCart($book_id, $customer_id);
                if (!empty($cart)) {
                    $quantity = $cart['quantity'] + 1;
                    (new Cart())->update($cart['id'], ['quantity' => $quantity, 'total' => $quantity * $book['price']]);
                } else {
                    $cart = [
                        'book_id' => $book['id'],
                        'customer_id' => $customer_id,
                        'quantity' => 1,
                        'total' => $book['price']
                    ];
                    (new Cart())->insert($cart);
                }
            }
        } catch (\Exception $e) {
            echo 'Lỗi: '.$e->getMessage().' Line:'.$e->getLine();
            exit();
        }

        with('msg', 'Bạn cần đăng nhập thể thực hiện thêm sản phẩm vào giỏ hàng');
        redirect(route());
    }

    public function delete()
    {
        if (!checkLogin()) {
            with('msg', 'Bạn cần đăng nhập thể thực hiện thêm sản phẩm vào giỏ hàng');
            redirect(route());
        }

        try {
            $book_id = $_POST['book_id'] ?? null;
            $customer_id = $_SESSION['customer']['id'] ?? null;
            $cart = (new Cart())->getCart($book_id, $customer_id);

            if ($cart) {
                (new Cart())->delete($cart['id']);
            }
//        print_pre($books);die();
        }catch (\Exception $e) {
            echo 'Lỗi: '.$e->getMessage().' Line:'.$e->getLine();
            exit();
        }

        redirect(route());
    }
}
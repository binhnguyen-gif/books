<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Book;
use App\View;


class BookController extends Controller
{
    public function __construct()
    {
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }

    public function list(): View
    {
        $books = (new Book())->getListBook();
        return View::make('backend/books/index', ['books' => $books]);
    }

    public function create(): View
    {
        return View::make('backend/books/create_update');
    }

    public function store()
    {
        try {
            if (checkMethod('POST') && isset($_POST['addBook'])) {
                $this->updateFile('image');
                $newBook = $this->extracted();
                $result = (new Book())->insert($newBook);
                if ($result) {
                    CustomSession::put('success', 'Thêm thành công');
                } else {
                    CustomSession::put('error', 'Có lỗi xảy ra vui lòng thử lại');
                }
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi: '.$e->getMessage().'line-> '.$e->getLine());
            back();
        }

        back();
    }

    public function show(): View
    {
        try {
            $id = $_GET['book_id'];
            $book = (new Book())->getById($id);
            return View::make('backend/books/create_update', ['book' => $book]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function update()
    {
        try {
            if (checkMethod('POST') && isset($_POST['updateBook'])) {
                $id = $_POST['book_id'];
                $book = (new Book())->getById($id);

                if (!check_upload('image')) {
//                    var_dump('vao');die();
                    delete_file($book['image']);
                    $this->updateFile('image');
                }
                $input = $this->extracted();
                $result = (new Book())->update($id, $input);
                if ($result) {
                    CustomSession::put('success', 'Update thành công');
                }
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi update book');
        }

        back();
    }

    public function delete()
    {
        try {
            $book_id = $_GET['book_id'];
            $book = (new Book())->getById($book_id);
            delete_file($book['image']);
            $result = (new Book())->delete($book_id);
            if ($result) {
                CustomSession::put('success', 'Xóa thành công');
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi xóa book');
        }

        back();
    }


    protected function updateFile($image): bool
    {
        if ($_FILES["{$image}"]["error"] > 0) {
            echo "Return Code: ".$_FILES["{$image}"]["error"]."<br>";die();
        } else {
            if (file_exists("assets/images/product/".file_name('image'))) {
                echo $_FILES["{$image}"]["name"]." already exists. ";die();
            } else {
                move_uploaded_file(
                    $_FILES["{$image}"]["tmp_name"],
                    "assets/images/product/".file_name('image')
                );
                return true;
            }
        }

        return false;
    }

    /**
     * @return void
     */
    protected function extracted(): array
    {
        return [
            'name' => $_POST['name'],
            'slug' => create_slug($_POST['name']),
//            'author' => $_POST['title'],
            'old_price' => $_POST['old_price'],
            'price' => $_POST['price'],
            'qty' => $_POST['qty'],
            'image' => file_name('image'),
            'category_id' => $_POST['category_id'],
            'publish_id' => $_POST['publish_id'],
            'description' => $_POST['description'],
            'detail' => $_POST['detail'],
            'posted_date' => date('Y-m-d'),
            'status' => $_POST['status'],
        ];
    }


}


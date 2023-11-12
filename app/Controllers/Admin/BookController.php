<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Book;
use App\View;


class BookController extends Controller
{
    public function list(): View
    {
        $books = (new Book())->getListBook();
//        print_pre($books);die();
        return View::make('backend/books/index', ['books' => $books]);
    }

    public function create(): View
    {
        return View::make('backend/books/create');
    }

    public function store()
    {
        if(checkAdmin()) {
            redirect(customRoute('admin/login'));
        }

        try {
            if (checkMethod('POST') && isset($_POST['addBook'])) {
                $this->updateFile('image');
                $book = [
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

                (new Book())->insert($book);
            }

        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi book');
        }

        CustomSession::put('success', 'Thêm thành công');
        back();
    }

    public function show(): View
    {
//        print_pre((new \App\Models\Publish())->getAll());die();
        try {
            $id = $_GET['book_id'];
            $book = (new Book())->getById($id);
            return View::make('backend/books/create', ['book' => $book]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }


    protected function updateFile($image): bool
    {
        if ($_FILES["{$image}"]["error"] > 0) {
            echo "Return Code: ".$_FILES["{$image}"]["error"]."<br>";
        } else {
            if (file_exists("assets/images/product/".$_FILES["{$image}"]["name"])) {
                echo $_FILES["{$image}"]["name"]." already exists. ";
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


}


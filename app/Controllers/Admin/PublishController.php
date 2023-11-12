<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Book;
use App\Models\Publish;
use App\View;


class PublishController extends Controller
{
    public function __construct()
    {
        if(!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }
    public function list(): View
    {
        $publish = (new Publish())->getAll();
//        print_pre($publish);die();
        return View::make('backend/publish/index', ['publish' => $publish]);
    }

    public function create(): View
    {
        return View::make('backend/publish/create_update');
    }

    public function store()
    {
        try {
            if (checkMethod('POST') && isset($_POST['addBook'])) {
                $this->updateFile('image');
                $newBook = $this->extracted();
                (new Book())->insert($newBook);
            }

        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi book');
            back();
        }

        CustomSession::put('success', 'Thêm thành công');
        back();
    }

    public function show(): View
    {
        try {
            $id = $_GET['book_id'];
            $book = (new Book())->getById($id);
            return View::make('backend/publish/create_update', ['book' => $book]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function update()
    {
        try {
            if (checkMethod('POST') && isset($_POST['updateBook'])) {
                if(check_upload('image')) {
                    $this->updateFile('image');
                }
                $id = $_POST['book_id'];
                $book = $this->extracted();
                (new Book())->update($id, $book);
            }

        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi book');
            back();
        }

        CustomSession::put('success', 'Update thành công');
        back();
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


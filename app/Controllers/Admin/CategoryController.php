<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Book;
use App\Models\Category;
use App\View;


class CategoryController extends Controller
{
    public function __construct()
    {
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }

    public function list(): View
    {
        $categories = (new Category())->getAll();
        return View::make('backend/category/index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return View::make('backend/category/create_update');
    }

    public function store()
    {
        try {
            if (checkMethod('POST') && isset($_POST['addCategory'])) {
                $newCategory = $this->extracted();
                (new Category())->insert($newCategory);
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi category');
            back();
        }

        CustomSession::put('success', 'Thêm thành công');
        back();
    }

    public function show(): View
    {
        try {
            $id = $_GET['category_id'];
            $category = (new Category())->getById($id);
            return View::make('backend/category/create_update', ['category' => $category]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function update()
    {
        try {
            if (checkMethod('POST') && isset($_POST['updateCategory'])) {
                $id = $_POST['category_id'];
                $category = $this->extracted();
                (new Category())->update($id, $category);
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi update category');
            back();
        }

        CustomSession::put('success', 'Update thành công');
        back();
    }

    public function delete()
    {
        try {
            $category_id = $_GET['category_id'];
            $result = (new Category())->delete($category_id);
            if ($result) {
                CustomSession::put('success', 'Xóa thành công');
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi xóa category');
        }

        back();
    }

    /**
     * @return void
     */
    protected function extracted(): array
    {
        return [
            'name' => $_POST['name'],
            'slug' => create_slug($_POST['name']),
        ];
    }


}


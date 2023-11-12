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
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }

    public function list(): View
    {
        $publish = (new Publish())->getAll();
        return View::make('backend/publish/index', ['publish' => $publish]);
    }

    public function create(): View
    {
        return View::make('backend/publish/create_update');
    }

    public function store()
    {
        try {
            if (checkMethod('POST') && isset($_POST['addPublish'])) {
                $newPublish = $this->extracted();
                (new Publish())->insert($newPublish);
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi publish');
            back();
        }

        CustomSession::put('success', 'Thêm thành công');
        back();
    }

    public function show(): View
    {
        try {
            $id = $_GET['publish_id'];
            $publish = (new Publish())->getById($id);
            return View::make('backend/publish/create_update', ['publish' => $publish]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function update()
    {
        try {
            if (checkMethod('POST') && isset($_POST['updatePublish'])) {
                $id = $_POST['publish_id'];
                $publish = $this->extracted();
                (new Publish())->update($id, $publish);
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi publish');
            back();
        }

        CustomSession::put('success', 'Update thành công');
        back();
    }

    public function delete()
    {
        try {
            $publish_id = $_GET['publish_id'];
            $publish = (new Publish())->getById($publish_id);
            $result = (new Publish())->delete($publish_id);
            if ($result) {
                CustomSession::put('success', 'Xóa thành công');
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi xóa publish');
        }

        back();
    }


    protected function extracted(): array
    {
        return [
            'name' => $_POST['name'],
            'address' =>$_POST['address']
        ];
    }


}


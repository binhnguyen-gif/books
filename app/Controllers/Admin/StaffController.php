<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\User;
use App\View;

class StaffController extends Controller
{

    public function __construct()
    {
        // var_dump($_SESSION['user']['role']);die();
        if(!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }
    public function list(): View
    {
        $users = (new User())->getAll();
        return View::make('backend/users/index', ['users' => $users]);
    }

    public function create(){
        return View::make('backend/users/create_update');
    }

    public function store()
    {
        try {
            if (checkMethod('POST') && isset($_POST['addStaff'])) {
                $newStaff = $this->extracted();
                $newStaff['password'] = md5($_POST['phone']);
                if(uniqueEmail($_POST['email'])) {
                    CustomSession::put('warning', 'Email này đã được đăng ký vui long sử dùng email khác');
                    back();
                }

                $staff = (new User())->insert($newStaff);
                if($staff) {
                    CustomSession::put('success', 'Thêm thành công');
                }
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi: ' . $e->getMessage());
            back();
        }
        back();
        
    }


    public function show(): View
    {
        try {
            $id = $_GET['user_id'];
            $user = (new User())->getById($id);
            return View::make('backend/users/create_update', ['user' => $user]);
        } catch (\Exception $e) {
            return View::make('errors/404');
        }
    }

    public function update()
    {
        try {
            if (checkMethod('POST') && isset($_POST['updateStaff'])) {
                $id = $_POST['user_id'];
                $user = $this->extracted();
                (new User())->update($id, $user);
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi update user');
            back();
        }

        CustomSession::put('success', 'Update thành công');
        back();
    }

    public function delete()
    {
        try {
            $user_id = $_GET['user_id'];
            $user= (new User())->getById($user_id);
            $result = (new User())->delete($user_id);
            if ($result) {
                CustomSession::put('success', 'Xóa thành công');
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi xóa user');
        }

        back();
    }

    protected function extracted(): array
    {
        return [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'role' => $_POST['role'],
        ];
    }

}


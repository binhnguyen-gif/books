<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Helpers\CustomSession;
use App\Models\Book;
use App\Models\Contact;
use App\View;


class ContactController extends Controller
{
    public function __construct()
    {
        if (!checkAdmin()) {
            redirect(customRoute('admin/login'));
        }
    }

    public function index(): View
    {
        $contact = (new Contact())->getAll();
        return View::make('backend/contact/index', ['contact' => $contact]);
    }

    public function show(): View
    {
        return View::make('backend/contact/show');
    }

    public function delete()
    {
        try {
            $contact_id = $_GET['contact_id'];
            $result = (new Contact())->delete($contact_id);
            if ($result) {
                CustomSession::put('success', 'Xóa thành công');
            }
        } catch (\Exception $e) {
            CustomSession::put('error', 'Lỗi xóa contact');
        }

        back();
    }


}


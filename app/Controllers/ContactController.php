<?php

namespace App\Controllers;

use App\View;
use App\Models\Cantact;

class ContactController extends Controller
{
    public function index()
    {
        return View::make('contact');
    }

    public function store()
    {
        if(checkMethod('POST') && isset($_POST['submitContact'])) {
            $newContact = $this->extracted();
            try {
                // print_pre($newContact);die();
                $contact = (new Contact())->insert($newContact);
                if($contact) {
                    CustomSession::put('success', 'Chúng tôi xin nhận ý kiến phản hồi của bạn.');
                }
                
            } catch (Exception $e) {
                CustomSession::put('error', 'Xin vui long thử lại sau.');
            }
            
        }
        
        return View::make('contact');
    }

    protected function extracted(): array
    {
        return [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];
    }

}
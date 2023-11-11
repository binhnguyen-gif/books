<?php

namespace App\Controllers;

use App\View;

class ContactController extends Controller
{
    public function index()
    {
        return View::make('contact');
    }

    public function store()
    {
        return View::make('contact');
    }

}
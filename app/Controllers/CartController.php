<?php

namespace App\Controllers;

use App\Models\Book;
use App\View;

class CartController extends Controller
{
    public function index() {

        $books = (new Book())->getAll();
//        print_pre($relatedBooks);die();

        return View::make('cart', ['book' => $books]);
    }
}
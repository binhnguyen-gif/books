<?php

namespace App\Controllers;

use App\Models\Book;
use App\View;

class BookController extends Controller
{
    public function detail() {
        $id = $_GET['id'];
        $book = (new Book())->getById($id);
        $relatedBooks = (new Book())->getRelatedProducts($id, $book['category_id']);
//        print_pre($relatedBooks);die();

        return View::make('book_detail', ['book' => $book, 'relatedBooks' => $relatedBooks]);
    }
}
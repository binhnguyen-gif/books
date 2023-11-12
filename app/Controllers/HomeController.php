<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publish;
use App\View;

class HomeController
{
    public function index(): View
    {
        $search = $_GET['search'] ?? '';
        $books = (new Book())->getBooksByKey($search);
        $sellingBooks = (new Book())->getBooksByCondition('qty_buy', 'DESC');
        $categories = (new Category())->getAll();
        $publish = (new Publish())->getAll();

        return View::make('home', ['books' => $books, 'categories' => $categories, 'publish' => $publish, 'sellingBooks' => $sellingBooks]);
    }

    public function books() {
        $booksByCategory = (new Category())->getAllProductByCategory();
//        print_pre($booksByCategory);die();
        return View::make('category_books', ['booksByCategory' => $booksByCategory]);
    }
}

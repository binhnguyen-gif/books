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
        $categories = (new Category())->getAll();
        $publish = (new Publish())->getAll();

        return View::make('home', ['books' => $books, 'categories' => $categories, 'publish' => $publish]);
    }

    public function books() {
        $booksByCategory = (new Category())->getAllProductByCategory();
        return View::make('category_books', ['booksByCategory' => $booksByCategory]);
    }
}

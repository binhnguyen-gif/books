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
        $sort = $_GET['sort_by_price'] ?? '';
        if(empty($search) && isset($_GET['search'])) {
            redirect(route());
        }

        $books = (new Book())->getBooksByKey($search, $sort);
        $sellingBooks = (new Book())->getBooksByCondition('qty_buy', 'DESC');
        $categories = (new Category())->getAll();
        $publish = (new Publish())->getAll();

        return View::make('home', ['books' => $books, 'categories' => $categories, 'publish' => $publish, 'sellingBooks' => $sellingBooks]);
    }

    public function books() {
        $publish_id = $_GET['publish_id'] ?? null;
        $booksByCategory = (new Category())->getAllProductByCategory($publish_id);
        $publish = (new Publish())->getAll();

        return View::make('category_books', ['booksByCategory' => $booksByCategory, 'publish' => $publish]);
    }
}

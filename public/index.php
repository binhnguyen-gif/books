<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\Controllers\HomeController;
use App\Controllers\ContactController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\BookController;
use App\Controllers\CartController;
use App\Controllers\OrderController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\LoginController as AdminLogin;
use App\Controllers\Admin\BookController as AdminBook;
use App\Controllers\Admin\CategoryController as AdminCategory;
use App\Controllers\Admin\PublishController as AdminPublish;
use App\Controllers\Admin\CustomerController as AdminCustomer;
use App\Controllers\Admin\OrderController as AdminOrder;
use App\Router;

require_once __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//const STORAGE_PATH = __DIR__.'/../storage';
const VIEW_PATH = __DIR__.'/../views';

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->post('/login', [LoginController::class, 'login'])
    ->post('/register', [RegisterController::class, 'register'])
    ->get('/logout', [LoginController::class, 'logout'])
    ->get('/books', [HomeController::class, 'books'])
    ->get('/contact', [ContactController::class, 'index'])
    ->post('/contact', [ContactController::class, 'store'])
    ->get('/detail', [BookController::class, 'detail'])
    ->get('/cart', [CartController::class, 'index'])
    ->post('/cart', [CartController::class, 'addCart'])
    ->post('/delete-book', [CartController::class, 'delete'])
    ->post('/order', [OrderController::class, 'store'])
    ->get('/checkout/vnPayCheck', [OrderController::class, 'vnPayCheck'])
    ->get('/admin', [DashboardController::class, 'index'])
    ->get('/admin/login', [DashboardController::class, 'login'])
    ->get('/admin/logout', [DashboardController::class, 'logout'])
    ->post('/admin/show-login', [AdminLogin::class, 'login'])
    ->get('/admin/list-book', [AdminBook::class, 'list'])
    ->get('/admin/book/create', [AdminBook::class, 'create'])
    ->post('/admin/book/create', [AdminBook::class, 'store'])
    ->get('/admin/book/show', [AdminBook::class, 'show'])
    ->post('/admin/book/update', [AdminBook::class, 'update'])
    ->post('/admin/book/delete', [AdminBook::class, 'delete'])
    ->get('/admin/list-category', [AdminCategory::class, 'list'])
    ->get('/admin/category/create', [AdminCategory::class, 'create'])
    ->post('/admin/category/create', [AdminCategory::class, 'store'])
    ->get('/admin/category/show', [AdminCategory::class, 'show'])
    ->post('/admin/category/update', [AdminCategory::class, 'update'])
    ->post('/admin/category/delete', [AdminCategory::class, 'delete'])
    ->get('/admin/list-publish', [AdminPublish::class, 'list'])
    ->get('/admin/publish/create', [AdminPublish::class, 'create'])
    ->post('/admin/publish/create', [AdminPublish::class, 'store'])
    ->get('/admin/publish/show', [AdminPublish::class, 'show'])
    ->post('/admin/publish/update', [AdminPublish::class, 'update'])
    ->post('/admin/publish/delete', [AdminPublish::class, 'delete'])
    ->get('/admin/list-customer', [AdminCustomer::class, 'list'])
    ->get('/admin/customer/create', [AdminCustomer::class, 'create'])
    ->post('/admin/customer/create', [AdminCustomer::class, 'store'])
    ->get('/admin/customer/show', [AdminCustomer::class, 'show'])
    ->post('/admin/customer/update', [AdminCustomer::class, 'update'])
    ->post('/admin/customer/delete', [AdminCustomer::class, 'delete'])
    ->get('/admin/list-order', [AdminOrder::class, 'list'])
    ->get('/admin/order/show', [AdminOrder::class, 'show']);

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();

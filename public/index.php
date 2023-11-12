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
    ->get('/admin', [DashboardController::class, 'index']);
(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();

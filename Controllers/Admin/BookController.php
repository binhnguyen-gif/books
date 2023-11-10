<?php

namespace Controller\Admin;

class BookController extends Controller {
    private $userModel;
    private $bookModel;
    private $categoryModel;
    protected $view;

    public function __construct($view) {
        parent::__construct(null); 
        $this->view = $view;
        // $this->userModel = $userModel;
        // $this->bookModel = $bookModel;
        // $this->categoryModel = $categoryModel;
    }

    public function index() {
        
        // $users = $this->userModel->getAllUsers();
        // $books = $this->bookModel->getAllBooks();
        // $categories = $this->categoryModel->getAllCategories();
        $this->view->render('Home', '');

        
    }

    // Các phương thức xử lý logic khác cho trang chủ
}
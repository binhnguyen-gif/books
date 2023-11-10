<?php

namespace Controller;

class BookController extends Controller
{
    private $userModel;
    private $bookModel;
    private $categoryModel;
    protected $view;

    public function __construct($view)
    {
        parent::__construct(null);
        $this->view = $view;
        // $this->userModel = $userModel;
        $this->bookModel = new Book();
        // $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        // $users = $this->userModel->getAllUsers();
        $books = $this->bookModel->getAll();
        // $categories = $this->categoryModel->getAllCategories();
        $this->view->render('Home', $books);
    }

    public function show($id)
    {
        $book = $this->bookModel->getBookById($id);
    }
}
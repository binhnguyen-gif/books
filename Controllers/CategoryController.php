<?php

namespace Controller;
class CategoryController extends Controller
{

    private $categoryModel;
    protected $view;

    public function __construct($view)
    {
        parent::__construct(null);
        $this->view = $view;
    }

    public function index()
    {
        // $users = $this->userModel->getAllUsers();
        $books = $this->bookModel->getAll();
        // $categories = $this->categoryModel->getAllCategories();
        $this->view->render('Home', $books);
    }

    public function show($id) {
        $book = $this->bookModel->getBookById($id);
    }
}
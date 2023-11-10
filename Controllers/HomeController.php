<?php

namespace Controller;

class HomeController extends Controller
{
    private $bookModel;
    private $categoryModel;
    private $publishModel;

    protected $view;

    public function __construct($view = null)
    {
        parent::__construct(null);
        $this->view = $view;
        $this->categoryModel = new Category();
        $this->bookModel = new Book();
        $this->publishModel = new Publish();
    }

    public function index()
    {
        var_dump(md5(123456));
//        print_pre($this->categoryModel->getAllProductByCategory());die();
        try {
            $data['publish'] = $this->publishModel->getAll();
            $data['books'] = $this->bookModel->getAll();
            $data['categories'] = $this->categoryModel->getAll();
            // var_dump($books);
            $this->view->render('Home', $data);
        } catch (\Exception $e) {
            $this->view->render('errors/503', []);
        }
    }

    public function book()
    {
        $data['booksByCategory'] = $this->categoryModel->getAllProductByCategory();
        $this->view->render('category_books', $data);
    }

}
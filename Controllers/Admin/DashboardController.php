<?php

namespace Controller\Admin;

class DashboardController extends Controller
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
        return $this->view->render('backend/admin', []);
    }


}
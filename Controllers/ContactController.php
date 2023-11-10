<?php
class ContactController extends Controller
{

    public function __construct($view)
    {
        parent::__construct(null);
        $this->view = $view;
    }

    public function index()
    {
        return $this->view->render('Contact', []);
    }

}
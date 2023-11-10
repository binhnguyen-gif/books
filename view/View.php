<?php
class View {
    public function render($template, $data = []) {
        // var_dump($data);die();
        if(!empty($data)) {
            extract($data);
            // echo "<pre>";
            // print_r($books);
            // echo "</pre>";
            // print_r($data);die();
        }
        include 'View/templates/' . $template . '.php';
    }
}
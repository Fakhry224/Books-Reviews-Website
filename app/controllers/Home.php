<?php

class Home extends Controller {
    private $data_home = [
        'css' => '/css/home_style',
        'title' => 'Home Page'
    ];

    public function index($genre_id = 1) {

        unset($_SESSION['book_id']);

        if(!isset($_SESSION['user_id'])) {
            $data = [
                'css' => '/css/login_style',
                'title' => 'Login Page'
            ];

            $this->view('template/header', $data);
            $this->view('auth/login');
            $this->view('template/footer');
        } else {

            $data = [
                'books' => $this->showBook($genre_id)
            ];

            $this->view('template/header', $this->data_home);
            $this->view('home/index', $data);
            $this->view('template/footer');
        }
        
    }

    public function showBook($genre) {
        return $this->model('BookModel')->showBook($genre);
    }
}

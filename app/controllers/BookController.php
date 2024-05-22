<?php

class BookController extends Controller {
    private $metadata = [
        'css' => '/css/detail_style',
        'title' => 'Book Detail Page'
    ];

    public function index() {
        $book_model = $this->model('BookModel');
        
        if (isset($_POST['book_id'])) {
            $book_id = $_POST['book_id'];
            $_SESSION['book_id'] = $book_id;
        } 

        $data = [
            'detail_book' => $book_model->getBookDetail($_SESSION['book_id']),
            'comment' => $book_model->getAllComment($_SESSION['book_id'])
        ];

        $this->view('template/header', $this->metadata);
        $this->view('book_detail/index', $data);
        $this->view('template/footer');
    }

    public function insertComment() {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'book_id' => $_SESSION['book_id'],
                'user_id' => $_SESSION['user_id'],
                'comment' => trim($_POST['comment'])
            ];

            if (empty($data['comment'])) {
                Flasher::setFlash('Failed Insert Comment', 'Cannot Insert Empty Comment', 'danger');
                header('Location: ' . BASEURL . '/BookController');
                exit;
            }

            if ($this->model('BookModel')->insertComment($data) > 0) {
                Flasher::setFlash('Successfuly Insert Comment', 'Success', 'success');
                header('Location: ' . BASEURL . '/BookController');
                exit;
            } else {
                Flasher::setFlash('Error Insert Comment', 'Failed', 'danger');
                header('Location: ' . BASEURL . '/BookController');
                exit;
            }
        }
    }
}

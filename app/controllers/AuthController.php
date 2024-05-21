<?php

class AuthController extends Controller {
    private $data_login = [
        'css' => '/css/login_style',
        'title' => 'Login Page'
    ];
    private $data_register = [
        'css' => '/css/register_style',
        'title' => 'Register Page'
    ];

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['email'], $_POST['password'])){
                $data = [
                    'email' => rtrim($_POST['email']),
                    'password' => rtrim($_POST['password'])
                ];

                $userModel = $this->model('UserModel');
                $user = $userModel->login($data);
                
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    Flasher::setFlash('Successfully!', 'Login', 'success');
                    header('Location: ' . BASEURL . '/Home/index');
                } else {
                    $data['error'] = 'Invalid email or password';
                    Flasher::setFlash('Login Failed', $data['error'], 'danger');
                    header('Location: ' . BASEURL . '/auth/login');
                }
            }
        } else {
            $this->view('template/header', $this->data_login);
            $this->view('auth/login');
            $this->view('template/footer');
        }
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'error' => ''
                ];

                if (empty($data['email']) || empty($data['name']) || empty($data['password']) || empty($data['confirm_password'])) {
                    $data['error'] = 'Please fill out all fields';
                } elseif ($data['password'] != $data['confirm_password']) {
                    $data['error'] = 'Passwords do not match';
                } elseif ($this->model('UserModel')->findUserByEmail($data['email'])) {
                    $data['error'] = 'Email is already taken';
                }

                if (empty($data['error'])) {
                    $userModel = $this->model('UserModel');
                    if ($userModel->register($data)) {
                        Flasher::setFlash('Success', 'Register', 'success');
                        header('Location: ' . BASEURL . '/auth/login');
                    } else {
                        $data['error'] = 'Something went wrong. Please try again';
                    }
                }

                $this->view('auth/register', $this->data_register);
            } else {
                echo 'Field is empty';
            }
        } else {
            $this->view('template/header', $this->data_register);
            $this->view('auth/register');
            $this->view('template/footer');
        
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        header('Location: ' . BASEURL . '/auth/login');
    }
}
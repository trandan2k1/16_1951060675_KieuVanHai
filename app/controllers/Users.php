<?php

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->songModel = $this->model('Song');
    }

    // Chuyển về trang 404 khi url sai
    public function index(){
        $this->view('404');
    }

    public function register() {
        $vn = $this->songModel->cate_song("Việt Nam");
        $usuk = $this->songModel->cate_song("Âu Mỹ");
        $data = [
            'username' => '',
            'email' => '',
            'email_verification_link' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'title' =>'NhacVn',
            'list_vn'   => $vn,
            'list_usuk' => $usuk,

        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $token = md5($_POST['email']).rand(10,9999);
                $email = trim($_POST['email']);
              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'email_verification_link' => $token,
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'title' => 'NhacVn'
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //validate username chỉ chứa chữ hoặc số
            if (empty($data['username'])) {
                $data['usernameError'] = 'Vui lòng nhập tên đăng nhập';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Tên đăng nhập chỉ bao gồm chữ hoặc số';
            } else {
                //Kiểm tra username đã tồn tại hay chưa
                if ($this->userModel->findUserByUsername($data['username'])) {
                $data['usernameError'] = 'Tên đăng nhập đã tồn tại';
                }
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'Vui lòng nhập email';
            }else {
                //Kiểm tra email đã tồn tại hay chưa
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email đã tồn tại';
                }
            }

           // Validate password phải từ 6 kí tự và có ít nhất 1 chữ số
            if(empty($data['password'])){
              $data['passwordError'] = 'Vui lòng nhập mật khẩu';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Mật khẩu cần ít nhất 6 kí tự';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Mật khẩu phải có ít nhất 1 chữ số';
            }

            //Validate confirm password 
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Vui lòng nhập lại mật khẩu';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Mật khẩu không trùng khớp, vui lòng thử lại';
                }
            }

            // Kiểm tra tất cả không có lỗi mới tiến hành đăng kí user mới
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Đăng kí user mới từ hàm của model user
                if ($this->userModel->register($data)) {
                    //Chuyển về trang login
                    header('location: ' . URLROOT . '/users/login?Message=');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'title' => 'NhacVn',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'status' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'status' => '',
                'usernameError' => '',
                'passwordError' => '',
                'title' =>'NhacVn'
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Vui lòng nhập tên đăng nhập hoặc email';
            } else {
                //Kiểm tra username hay email đã tồn tại hay chưa
                if (!$this->userModel->findUserByUsernameOrEmail($data['username'])) {
                $data['usernameError'] = 'Tên tài khoản hoặc mật khẩu không chính xác';
                }
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Vui lòng nhập mật khẩu';
            }

            // Kiểm tra tất cả không có lỗi mới tiến hành đăng nhập
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Tên tài khoản hoặc mật khẩu không chính xác';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'status' => '',
                'usernameError' => '',
                'passwordError' => '',
                'title' =>'NhacVn'
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['status'] = $user->status;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['status']);
        header('location:' . URLROOT . '/users/login');
    }
}

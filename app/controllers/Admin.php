<?php
class Admin extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('Admin_model');
    }

    // Kiểm tra có session với status = 2 mới được phép vào trang admin
    public function index()
    {
        if (isLoggedIn()) {
            if ($_SESSION['status'] == 2) {
                $data = [
                    'title' => 'NhacVn'
                ];
                $this->view('admin/adminView', $data);
            } else {
                $this->view('404');
            }
        } 
        else {
            $this->view('404');
        }
    }
}

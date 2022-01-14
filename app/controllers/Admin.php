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
                $songs = $this->adminModel->getSongs();
                var_dump($songs);exit;

                $data = [
                    'title' => 'NhacVn', 
                    'songs' => $songs
  
                ];
                $this->view('admin/adminAdd', $data);
            } else {
                $this->view('404');
            }
        } 
        else {
            $this->view('404');
        }
    }
}

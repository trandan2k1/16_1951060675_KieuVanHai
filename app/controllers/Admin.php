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
                // var_dump($songs);exit;

                $data = [
                    'title' => 'NhacVn', 
                    'songs' => $songs
  
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
    

    public function edit()
    {
        if (isLoggedIn()) {
            if ($_SESSION['status'] == 2) {
                if ($_GET['id'] != NULL) {
                    $id = $_GET['id'];
                    $song = $this->adminModel->getSong($id);
                    // Check POST
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        //Sanitize post data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        $data_update = [
                            'name' => trim($_POST['name']),
                            'img' => trim($_POST['img']),
                            'src' => trim($_POST['src']),
                            'cate_id' => trim($_POST['cate_id']),
                            'sg_id' => trim($_POST['sg_id']),
                            'song_releasedate' => trim($_POST['song_releasedate'])
                        ];
                        $this->adminModel->updateSong($id, $data_update['name'], $data_update['img'], $data_update['src'], $data_update['cate_id'], $data_update['sg_id'], $data_update['song_releasedate']);
                        header('location:' . URLROOT . '/admin');
                    } else {
                        $data = [
                            'title' => 'NhacVn Admin',
                            'song' => $song
                        ];
                        $this->view('admin/adminEdit', $data);
                    }
                } else {
                    $this->view('404');
                }
            } else {
                $this->view('404');
            }
        } else {
            $this->view('404');
        }
    }

    public function delete()
    {
        if (isLoggedIn()){
            if ($_SESSION['status'] == 2){
                if (isset($_GET['id'])){
                    $id= $_GET['id'];
                   $this->adminModel->delete($id);
                   header('location:' .URLROOT.'/admin/');
            
                }
                
                    
                }
            
        }
    }


   public function add(){
    
        if (isLoggedIn()) {
            if ($_SESSION['status'] == 2) {
               
              
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        //Sanitize post data
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                        $data_update = [
                            'name' => trim($_POST['name']),
                            'img' => trim($_POST['img']),
                            'src' => trim($_POST['src']),
                            'cate_id' => trim($_POST['cate_id']),
                            'sg_id' => trim($_POST['sg_id']),
                            'song_releasedate' => trim($_POST['song_releasedate'])
                        ];
                        // $this->adminModel->add($data_update);
                        var_dump($this->adminModel->add($data_update));exit;
                    } else {
                        $data = [
                            'title' => 'NhacVn Admin',
                           
                        ];
                        $this->view('admin/adminAdd', $data);
                    
                }
            } else {
                $this->view('404');
            }
        } else {
            $this->view('404');
        }
    }






        
       
        
       
    




}



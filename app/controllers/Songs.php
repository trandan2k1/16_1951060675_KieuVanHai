<?php
class Songs extends Controller
{
    public function __construct()
    {
        $this->songModel = $this->model('Song');
    }

    // Chuyển về trang 404 khi url sai

    public function index()
    {
        $this->view('404');
    }

    //Gửi dữ liệu bài hát vào view bai-hat dựa vào id gắn trên url

    public function baihat()
    {
        if(isLoggedIn()){
            if (isset($_GET['id'])) {
                $id_song = $_GET['id'];
            }
            $id = $this->songModel->getIdUserActivity($_SESSION['user_id'],$id_song);
            if($id != "-1"){
                $this->songModel->update_user_activity($id);
            }
            else{
                $this->songModel->user_activity($_SESSION['user_id'],$id_song);
            }
        }
        $id = -1;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $this->view('404');
        }
        $song = $this->songModel->getSong($id);
        $vn = $this->songModel->cate_song("Việt Nam");
        $usuk = $this->songModel->cate_song("Âu Mỹ");
        $data = [
            'title' => 'NhacVn',
            'list_vn'   => $vn,
            'list_usuk' => $usuk,
            'song' => $song
        ];
        $this->view('songs/bai-hat', $data);

        
    }

    //Gửi dữ liệu bài hát vào view the-loai dựa vào id gắn trên url

    public function cate()
    {
        $id = -1;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $this->view('404');
        }
        $song = $this->songModel->getCateSong($id);
        $vn = $this->songModel->cate_song("Việt Nam");
        $usuk = $this->songModel->cate_song("Âu Mỹ");
        $data = [
            'title' => 'NhacVn',
            'list_vn'   => $vn,
            'list_usuk' => $usuk,
            'song' => $song
        ];
        $this->view('songs/the-loai', $data);

    }

    // Có id từ url thì vào trang nghệ sĩ cụ thể , không thì chuyển hướng trang list nghê sĩ
    public function nghesi()
    {
        $nghesi = $this->songModel->getSingerList();
        $vn = $this->songModel->cate_song("Việt Nam");
        $usuk = $this->songModel->cate_song("Âu Mỹ");
        $id = -1;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $song = $this->songModel->getCateSong($id);
            $data = [
                'title' => 'NhacVn',
                'list_vn'   => $vn,
                'list_usuk' => $usuk,
                'song' => $song
            ];
            $this->view('songs/nghe-si', $data);
        } else {
            $data = [
                'title' => 'NhacVn',
                'list_vn'   => $vn,
                'list_usuk' => $usuk,
                'nghesi' => $nghesi
            ];
            $this->view('songs/list-nghe-si', $data);
        }
    }

    public function yeuthich(){
        if(isLoggedIn()){
            if (isset($_GET['id'])) {
                $id_song = $_GET['id'];
                if(!$this->songModel->check_favorite($_SESSION['user_id'],$id_song)){
                    $this->songModel->add_favorite_song($_SESSION['user_id'],$id_song);
                    header('location:' . URLROOT . '/songs/baihat/?id='.$id_song.'');
                } else {
                    $this->songModel->del_favorite_song($_SESSION['user_id'],$id_song);
                    header('location:' . URLROOT . '/songs/baihat/?id='.$id_song.'');
                }
            } else {
                $this->view('404');
            }
        }
    }

}

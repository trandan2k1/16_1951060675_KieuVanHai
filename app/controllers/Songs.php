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
}

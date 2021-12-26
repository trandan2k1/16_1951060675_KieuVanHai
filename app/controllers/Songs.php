<?php
class Songs extends Controller
{
    public function __construct()
    {
        $this->songModel = $this->model('Song');
    }

    public function index()
    {
        $this->view('404');
    }
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
}

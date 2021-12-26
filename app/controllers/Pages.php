<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->songModel = $this->model('Song');
    }
    //Trang chủ home page
    public function index()
    {
        $vn = $this->songModel->cate_song("Việt Nam");
        $usuk = $this->songModel->cate_song("Âu Mỹ");
        $newsong = $this->songModel->getNewSong();

        $data = [
            'title' => 'NhacVn',
            'list_vn'   => $vn,
            'list_usuk' => $usuk,
            'new_song' => $newsong
        ];

        $this->view('index', $data);
    }

    
}

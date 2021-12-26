<?php
class Song
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    // Truy vấn category nhac bằng thông tin gửi vào

    public function cate_song($cate_sort)
    {
        $this->db->query('SELECT * FROM song_category WHERE cate_sort= :cate_sort');
        $this->db->bind(':cate_sort', $cate_sort);
        $row = $this->db->resultSet();
        return $row;
    }
    // Truy vấn bài hát nhac mới trong khoảng thời gian từ ... đến hiện tại
    public function getNewSong()
    {
        $this->db->query('SELECT * FROM v WHERE song_releasedate >= (SELECT DATE_SUB(now(),INTERVAL 2 YEAR)) and song_releasedate <= now()');
        return $this->db->resultSet();
    }
    //Truy vấn bài hát qua id
    public function getSong($id)
    {
        $this->db->query('SELECT * FROM baihat WHERE Id= :id');
        $this->db->bind(':id', $id);
        return  $this->db->single();
    }
    // Truy vấn bài hát qua thể loại
    public function getCateSong($id)
    {
        $this->db->query('SELECT * FROM baihat WHERE cate_id= :id');
        $this->db->bind(':id', $id);
        return  $this->db->resultSet();
    }
}

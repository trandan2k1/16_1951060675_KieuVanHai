<?php
class Song {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function cate_song($cate_sort) {
        $this->db->query('SELECT * FROM song_category WHERE cate_sort= :cate_sort');
        $this->db->bind(':cate_sort', $cate_sort);
        $row = $this->db->resultSet();
        return $row;
   }
   public function getNewSong() {
    $this->db->query('SELECT * FROM v WHERE song_releasedate >= (SELECT DATE_SUB(now(),INTERVAL 2 YEAR)) and song_releasedate <= now()');
    return $this->db->resultSet();
   }
   public function getSong($id) {
    $this->db->query('SELECT * FROM baihat WHERE Id= :id');
    $this->db->bind(':id', $id);
    return  $this->db->single();
   }
}
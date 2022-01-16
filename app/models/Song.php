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
    // Truy vấn bài hát qua tên ca sĩ
    public function getSongBySingerName($sg_name)
    {
        $this->db->query('SELECT * FROM baihat WHERE sg_name= :sg_name');
        $this->db->bind(':sg_name', $sg_name);
        return  $this->db->resultSet();
    }
    //Truy vấn list nghệ sĩ
    public function getSingerList()
    {
        $this->db->query('SELECT * FROM singers');
        return  $this->db->resultSet();
    }

    //Gửi dữ liệu người dùng nghe nhạc lên database
    public function user_activity($user_id,$id_song){
        $this->db->query('SELECT CURRENT_TIMESTAMP');
        $listen_at = $this->db->single()->CURRENT_TIMESTAMP;

        $this->db->query('INSERT INTO user_listen ( id,`user_id`, `listen_at`, `last_listen`) VALUES ("",:user_id,:listen_at,:last_listen)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':listen_at', $listen_at);
        $this->db->bind(':last_listen', NULL);
        if ($this->db->execute()) {
            $id_listen = $this->db->last_id();
            $this->db->query('INSERT INTO detail_user_listen ( id_song,id_listen) VALUES (:id_song,:id_listen)');
            $this->db->bind(':id_song', $id_song);
            $this->db->bind(':id_listen', $id_listen);
            if ($this->db->execute()) {
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }
    
    public function check_listen($user_id,$id_song){
        $this->db->query('SELECT * FROM lichsu WHERE user_id = :user_id AND id_song = :id_song ');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':id_song', $id_song);
        if(!$this->db->rowCount()) {
            return false;
        } else {
            return true;
        }
    }


    public function getIdUserActivity($user_id,$id_song) {
        $this->db->query('SELECT * FROM lichsu WHERE user_id = :user_id AND id_song = :id_song ');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':id_song', $id_song);
        $result = $this->db->single()->id;
        if ($result != NULL){
            return $result;
        }
        else {
            return "-1";
        }
    }

    public function update_user_activity($user_listen){
        $this->db->query('SELECT CURRENT_TIMESTAMP');
        $last_listen = $this->db->single()->CURRENT_TIMESTAMP;
        // UPDATE `user_listen` SET `last_listen` = '2021-12-27 16:52:43' WHERE `user_listen`.`id` = 15;
        $this->db->query('UPDATE user_listen SET last_listen = :last_listen WHERE user_listen.id = :user_listen');
        $this->db->bind(':last_listen', $last_listen);
        $this->db->bind(':user_listen', $user_listen);
        if ($this->db->execute()) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function add_favorite_song($user_id,$id_song){
        $this->db->query('INSERT INTO favorite_song ( id,`user_id`, `song_id`) VALUES ("",:user_id,:song_id)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':song_id', $id_song);
        if ($this->db->execute()) {
            return  true;
        } else {
            return  false;
        }
    }

    public function del_favorite_song($user_id,$song_id){
        $this->db->query('DELETE FROM `favorite_song` WHERE user_id = :user_id AND song_id = :song_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':song_id', $song_id);
        if ($this->db->execute()) {
            return  true;
        } else {
            return  false;
        }
    }

    public function check_favorite($user_id,$song_id){
        $this->db->query('SELECT * FROM favorite_song WHERE user_id = :user_id AND song_id = :song_id ');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':song_id', $song_id);
        if(!$this->db->rowCount()) {
            return false;
        } else {
            return true;
        }
    }

}

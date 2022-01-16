<?php
class Admin_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSongs()
    {
        $this->db->query('SELECT * FROM v');
        return $this->db->resultSet();
    }

    public function getSong($Id)
    {
        $this->db->query('SELECT * FROM songs WHERE Id= :Id');
        $this->db->bind(':Id', $Id);
        return  $this->db->single();
    }


    public function updateSong($Id,$name,$img,$src,$cate_id,$sg_id,$song_releasedate)
    {
        $this->db->query('UPDATE songs SET name = :name,
        img = :img,
        src = :src,
        cate_id = :cate_id,
        sg_id = :sg_id,song_releasedate = :song_releasedate WHERE Id = :Id');
        $this->db->bind(':Id', $Id);
        $this->db->bind(':name', $name);
        $this->db->bind(':img', $img);
        $this->db->bind(':src', $src);
        $this->db->bind(':cate_id', $cate_id);
        $this->db->bind(':sg_id', $sg_id);
        $this->db->bind(':song_releasedate', $song_releasedate);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

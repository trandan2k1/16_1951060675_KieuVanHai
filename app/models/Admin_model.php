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
        $this->db->query('SELECT * FROM v ');
        return $this->db->resultSet();

    }
    public function getsong($Id)
    {
        $this->db->query( 'SELECT * FROM songs WHERE Id= :Id');
        $this->db->bind(':Id' , $Id);
        return $this->db->single();
    }
    public function updateSong($Id , $name ,$img,$src,$cate_id,$sg_id,$song_releasedate)
    {
        $this->db->query('UPDATE songs SET name = :name ,
        img = :img,
        src = :src,
        cate = :cate_id,
        sg_id = :sg_id,
        song_releasedate = :song_releasedate WHERE Id = :Id');
        $this->db->bind(':Id',$Id);
        $this->db->bind(':name',$name);
        $this->db->bind(':img',$img);
        $this->db->bind(':src',$src);
        $this->db->bind(':cate_id',$cate_id);
        $this->db->bind(':sg_id',$sg_id);
        $this->db->bind(':song_releasedate',$song_releasedate);
        if ($this->db->execute()){
            return true ;
        }else{
            return false;
        }
    }
    public function delete($Id){
        $this->db->query( 'DELETE FROM songs WHERE Id= :Id');
        $this->db->bind(':Id' , $Id);
        if ($this->db->execute()){
            return true ;
        }else{
            return false;
        }

    }


    


    public function add($data) {
        $this->db->query( 'INSERT INTO songs (name,img,src,cate_id,sg_id,song_releasedate) VALUES(:name,:img,:src,:cate_id,:sg_id,:song_releasedate)');


        $this->db->bind(':name',$data['name']);
        $this->db->bind(':src',$data['src']);
        $this->db->bind(':cate_id',$data['cate_id']);
        $this->db->bind(':sg_id',$data['sg_id']);
        $this->db->bind(':song_releasedate',$data['song_releasedate']);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

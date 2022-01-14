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
    

}

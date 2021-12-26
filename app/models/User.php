<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    // Đăng ký user mới
    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, email_verification_link ,password) VALUES(:username, :email,:email_verification_link, :password)');


        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':email_verification_link', $data['email_verification_link']);
        $this->db->bind(':password', $data['password']);

        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Check password gửi vào hàm trùng với trong csdl trả về thông tin user
    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    // Tìm user bằng email , email đc gửi từ controller
    public function findUserByEmail($email) {

        $this->db->query('SELECT * FROM users WHERE email = :email');


        $this->db->bind(':email', $email);

        if(!$this->db->rowCount()) {
            return false;
        } else {
            return true;
        }
    }
    // Tìm user bằng username , email đc gửi từ controller
    public function findUserByUsername($username) {

        $this->db->query('SELECT * FROM users WHERE username = :username');

        $this->db->bind(':username', $username);


        if(!$this->db->rowCount()) {
            return false;
        } else {
            return true;
        }
    }

}

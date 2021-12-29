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
        $this->db->query('SELECT * FROM users WHERE username = :username OR email = :username');

        
        $this->db->bind(':username', $username);
        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            if($row->status != 0) {
                return $row;
            }
            else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function findUserByUsernameOrEmail($username) {

        $this->db->query('SELECT * FROM users WHERE email = :email OR username = :email');


        $this->db->bind(':email', $username);

        if(!$this->db->rowCount()) {
            return false;
        } else {
            return true;
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

    public function checkMailVerify($token,$email){
        $this->db->query('SELECT * FROM users WHERE email_verification_link= :email_verification_link and email= :email');
        $this->db->bind(':email_verification_link', $token);
        $this->db->bind(':email', $email);
        return $this->db->single()->email_verified_at;
    }

    public function mailVerify($email){
        $this->db->query('SELECT CURRENT_TIMESTAMP');
        $email_verified_at = $this->db->single()->CURRENT_TIMESTAMP;
        $this->db->query('UPDATE users SET email_verified_at = :email_verified_at , status = 1 WHERE email= :email ');
        $this->db->bind(':email_verified_at', $email_verified_at);
        $this->db->bind(':email', $email);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

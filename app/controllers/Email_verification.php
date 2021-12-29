<?php
class Email_verification extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function verify_email()
    {
        if ($_GET['key'] && $_GET['token']) {
            $email = $_GET['key'];
            $token = $_GET['token'];
            $row = $this->userModel->checkMailVerify($token,$email);
                if ($row == NULL) {
                    var_dump($this->userModel->mailVerify($email));exit;
                    $msg = "Congratulations! Your email has been verified.";
                } else {
                    $msg = "You have already verified your account with us";
                }
            } else {
                $msg = "This email has been not registered with us";
            }
        } 
    }

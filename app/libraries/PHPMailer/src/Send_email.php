<?php
        require_once(__DIR__.'/PHPMailer.php');
        require_once(__DIR__.'/SMTP.php');
        require_once(__DIR__.'/Exception.php');
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class Email extends PHPMailer {
    private $_host = 'smtp.gmail.com';
    private $_user = ''dignitydogsngaw@gmail.com';';
    private $_password = 'gtgtgt123';

    public function __construct() {
        $this->isSMTP();
        $this->CharSet  = "utf-8";
        $this->SMTPDebug = 1;
        $this->Host = $this->_host;
        $this->Port = 465;
        $this->Username = $this->_user;
        $this->Password = $this->_password;
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'ssl'; 

        parent::__construct($exceptions);
    }


public static function sendEmailForAccountActive($email,$link){

        //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
    try {
                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('dignitydogsgnaw@gmail.com', 'Kiều Văn Hải');
        $mail->addAddress($email);     //Add a recipient            //Name is optional
    
    
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '[CSE485] Điểm danh tuần 20 - 27/12';
        $mail->Body    = $link;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

}



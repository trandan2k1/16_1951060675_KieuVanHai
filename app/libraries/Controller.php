<?php
    //Load the model and the view
    class Controller {
        public function model($model) {
            //Require model file
            require_once '../app/models/' . $model . '.php';
            //Instantiate model
            return new $model();
        }

        //Load the view (checks for the file)
        public function view($view, $data = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }

        public function goimail($link,$email){ 
            require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
            require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
            require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
              try {
                  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                  $mail->isSMTP();  
                  $mail->CharSet  = "utf-8";
                  $mail->Host = 'smtp.gmail.com';  //SMTP servers
                  $mail->SMTPAuth = true; // Enable authentication
              $nguoigui = ''; //Nhập email
              $matkhau = ''; //Nhập mật khẩu
              $tennguoigui = 'Hải';
                  $mail->Username = $nguoigui; // SMTP username
                  $mail->Password = $matkhau;   // SMTP password
                  $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                  $mail->Port = 465;  // port to connect to                
                  $mail->setFrom($nguoigui, $tennguoigui ); 
                  $to = "$email";
                  $to_name = "Bae";
                  
                  $mail->addAddress($to, $to_name); //mail và tên người nhận  
                  $mail->isHTML(true);  // Set email format to HTML
                  $mail->Subject = 'Xác nhận tài khoản';      
                  $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
                  $mail->smtpConnect( array(
                      "ssl" => array(
                          "verify_peer" => false,
                          "verify_peer_name" => false,
                          "allow_self_signed" => true
                      )
                  ));
                  $mail->send();
                  echo 'Đã gửi mail xong';
              } catch (Exception $e) {
                  echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
              }
  }

       
    }

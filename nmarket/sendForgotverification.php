<?php
include "connection.php";
include "PHPMailer.php";
include "Exception.php";
include "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

$email=$_GET["e"];
if(empty($email)){
    echo("please enter your email");
}else{
   $rs= Database::search("SELECT * FROM `user` WHERE `email`='".$email"'");
   $num=$rs->num_rows;
   if($num==1){
    $vcode=uniqid();
    Database::iud("UPDATE `user` SET `vcode`='".$vcode."' WHERE `email`='".$email."'");
     // email code
     $mail = new PHPMailer;
     $mail->IsSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'dnumidu@gmail.com';
     $mail->Password = '*************************';
     $mail->SMTPSecure = 'ssl';
     $mail->Port = 465;
     $mail->setFrom('dnumidu@gmail.com', 'N-market-verifiaction code');
     $mail->addReplyTo('dnumidu@gmail.com', 'N-market-verifiaction code');
     $mail->addAddress($email);
     $mail->isHTML(true);
     $mail->Subject = 'Forgot password verification code';
     $bodyContent = 'Your verification code is: '.$vcode;
     $mail->Body    = $bodyContent;

     if(!$mail->send()){
        echo("Email sending Failed");
     }else{
        echo("success");
     }
   }
}

?>
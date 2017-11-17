<?php
require("class.PHPMailer.php");

//if(isset($_POST['submit']) && !empty($_POST['conemail']) && !empty($_POST['feedcontact']) && !empty($_POST['queries']) && !empty($_POST['conname'])){


   $mail = new PHPMailer();

   $mail->IsSMTP();
   // set mailer to use SMTP
   $mail->Host = "smtp.yandex.com";  // specify main and backup server
   $mail->Port = 587;
   $mail->SMTPDebug = 3;
   $mail->SMTPAuth = true;     // turn on SMTP authentication
   $mail->Username = "contact@infotsav.com";  // SMTP username
   $mail->Password = "123456789"; // SMTP password

   $mail->From = "contact@infotsav.com";
   $mail->FromName = "Infotsav'16";
   $mail->AddAddress("unishubh1@gmail.com", "Validate Email");
//$mail->AddAddress("ellen@example.com");                  // name is optional
//$mail->AddReplyTo("unishubh1@gmail.com", "Information");

   $mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
   $mail->IsHTML(true);                                  // set email format to HTML

   $mail->Subject = "You have a Query!";
   $mail->Body    = "htd";
   $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
   if(!$mail->Send())
   {
      echo "Message could not be sent. <p>";
      echo "Mailer Error: " . $mail->ErrorInfo;
      exit;
   }
?>